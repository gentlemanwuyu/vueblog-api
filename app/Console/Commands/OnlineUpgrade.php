<?php
/**
 * 线上数据库升级脚本
 * User: Woozee
 * Date: 2021/1/3
 * Time: 20:59
 */

namespace App\Console\Commands;

use App\Enum\SystemConfigKeyEnum;
use App\Libs\Vendor\Markdown\Markdown;
use App\Libs\Vendor\Qiniu\Requests\Bucket\FileListRequest;
use App\Models\QiniuFile;
use Illuminate\Database\Schema\Blueprint;

class OnlineUpgrade extends BaseCommand
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'online:upgrade {--steps=}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '线上数据库升级';

    /** @var int[] 步骤 */
    protected array $steps = [1, 2];

    /**
     * visitors表的route_name映射关系
     *
     * @var array
     */
    protected array $routeNameMap = [
        'frontend::article.detail' => 'ArticleDetail',
        'frontend::category.index' => 'Category',
        'frontend::index.about' => 'About',
        'frontend::index.index' => 'Home',
        'frontend::index.search' => 'Search',
        'frontend::label.index' => 'Label',
        'frontend::section.index' => 'IT',
    ];

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->initParams();
        // 步骤1：增加字段/刷数据
        in_array(1, $this->steps) && $this->add();
        // 步骤2：删除字段/删除表
        in_array(2, $this->steps) && $this->delete();
    }

    protected function add(): void
    {
        /** @var Markdown $markdown */
        $markdown = app(Markdown::class);
        // visitor表的的route_name刷数据
        \DB::table('visitors')->get()->each(function ($item) {
            $routeName = $this->routeNameMap[$item->route_name] ?? '';
            \DB::table('visitors')->where('id', $item->id)->update(['route_name' => $routeName]);
        });
        // system_configs表中的about转成markdown格式
        $about = \DB::table('system_configs')->where('name', SystemConfigKeyEnum::ABOUT)->first();
        $content = $markdown->toMarkdown($about->value);
        \DB::table('system_configs')->where('name', SystemConfigKeyEnum::ABOUT)->update(['value' => $content]);
        // article_labels表增加id字段
        \Schema::table('article_labels', function (Blueprint $table) {
            if (!\Schema::hasColumn('article_labels','id')) {
                $table->id();
            }
        });
        if (!\Schema::hasTable('qiniu_files')) {
            \Schema::create('qiniu_files', function (Blueprint $table) {
                $table->id();
                $table->string('key')->default('')->comment('文件名');
                $table->string('hash')->default('')->comment('文件的HASH值');
                $table->integer('size')->default(0)->comment('资源内容的大小，单位：字节');
                $table->string('mime_type')->default('')->comment('资源的 MIME 类型');
                $table->bigInteger('put_time')->default(0)->comment('上传时间，单位：100纳秒，其值去掉低七位即为Unix时间戳');
                $table->string('md5')->default('')->comment('文件md5值');
                $table->tinyInteger('type')->default(0)->comment('资源的存储类型，2 表示归档存储，1 表示低频存储，0表示标准存储');
                $table->tinyInteger('status')->default(0)->comment('文件的存储状态，即禁用状态和启用状态间的的互相转换，0表示启用，1表示禁用');
                $table->string('end_user')->nullable()->default(null)->comment('资源内容的唯一属主标识');
                $table->timestamps();

                $table->index('key');
            });
        }
        if (!\Schema::hasTable('article_keywords')) {
            \Schema::create('article_keywords', function (Blueprint $table) {
                $table->id();
                $table->integer('article_id')->default(0)->comment('文章ID');
                $table->string('keyword')->default('')->comment('关键词');
                $table->index(['article_id', 'keyword']);
            });
        }
        \DB::table('articles')->get()->each(function ($item) use($markdown) {
            // articles表的keywords字段迁移到article_keywords表
            $keywordList = explode(',', $item->keywords);
            foreach ($keywordList as $keyword) {
                \DB::table('article_keywords')->updateOrInsert([
                    'article_id' => $item->id,
                    'keyword' => $keyword,
                ], [
                    'article_id' => $item->id,
                    'keyword' => $keyword,
                ]);
            }
            // 将内容转成markdown格式。还是手动转一下把
//            $content = $markdown->toMarkdown($item->content);
//            \DB::table('articles')->where('id', $item->id)->update(['content' => $content]);
        });
    }

    protected function delete(): void
    {
        // 删除visitors表的section_id字段
        \Schema::table('visitors', function (Blueprint $table) {
            if (\Schema::hasColumn('visitors','section_id')) {
                $table->dropColumn('section_id');
            }
        });
        // 删除articles表的keywords字段
        \Schema::table('articles', function (Blueprint $table) {
            if (\Schema::hasColumn('articles','keywords')) {
                $table->dropColumn('keywords');
            }
        });
    }

    /**
     * 初始化脚本参数
     *
     * @return void
     */
    protected function initParams(): void
    {
        if ($this->option('steps')) {
            $this->steps = array_intersect($this->steps, explode(',', $this->option('steps')));
        }
    }
}
