<?php
/**
 * 获取七牛云文件脚本
 * User: Woozee
 * Date: 2020/11/21
 * Time: 21:08
 */

namespace App\Console\Commands;

use App\Libs\Vendor\Qiniu\Requests\Bucket\FileListRequest;
use App\Models\QiniuFile;

class GetQiniuFiles extends BaseCommand
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'qiniu:get_files';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '读取七牛云的文件';

    /** @var string 七牛云空间 */
    protected string $bucket;

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
        $marker = '';
        do {
            $request = new FileListRequest();
            $request->bucket = $this->bucket;
            $request->marker = $marker;
            $resp = \Qiniu::getFileList($request);
            foreach ($resp->items as $fileItem) {
                $qiniuFile = QiniuFile::firstOrNew(['key' => $fileItem->key]);
                $qiniuFile->hash = $fileItem->hash;
                $qiniuFile->size = $fileItem->fsize;
                $qiniuFile->mime_type = $fileItem->mimeType;
                $qiniuFile->put_time = $fileItem->putTime;
                $qiniuFile->md5 = $fileItem->md5;
                $qiniuFile->type = $fileItem->type;
                $qiniuFile->status = $fileItem->status;
                $qiniuFile->end_user = $fileItem->hash;
                $qiniuFile->save();
            }
            $marker = $resp->marker;
        } while (!empty($marker));
    }

    /**
     * 初始化脚本参数
     *
     * @return void
     */
    protected function initParams(): void
    {
        $this->bucket = config('qiniu.bucket');
    }
}
