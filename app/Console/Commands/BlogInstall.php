<?php
/**
 * 安装博客项目脚本
 * User: Woozee
 * Date: 2020/10/25
 * Time: 16:21
 */

namespace App\Console\Commands;

use App\Models\User;

class BlogInstall extends BaseCommand
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'blog:install {--seed}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Install the blog project';

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
        $this->execShellWithPrettyPrint("php artisan migrate:fresh");
        $this->createAdminAccount();
        // 是否填充数据
        if ($this->option('seed')) {
            $this->execShellWithPrettyPrint("php artisan  db:seed");
        }
    }

    /**
     * 执行脚本
     *
     * @param  string $command
     * @return void
     */
    public function execShellWithPrettyPrint($command): void
    {
        $this->info('---');
        $this->info($command);
        $output = shell_exec($command);
        $this->info($output);
        $this->info('---');
    }

    /**
     * 创建管理员账号
     *
     * @return void
     */
    public function createAdminAccount(): void
    {
        User::create([
            'name' => 'admin',
            'email' => '492444775@qq.com',
            'password' => bcrypt('admin'),
        ]);
    }
}
