<?php
/**
 * 七牛云服务提供者类
 * User: Woozee
 * Date: 2020/11/21
 * Time: 13:22
 */

namespace App\Libs\Vendor\Qiniu;

use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;
use Qiniu\Auth;

class QiniuServiceProvider extends ServiceProvider implements DeferrableProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //前端响应对象
        $this->app->singleton('Qiniu', function() {
            $auth = new Auth(config('qiniu.access_key'), config('qiniu.secret_key'));
            return new Qiniu($auth);
        });
    }

    /**
     * 哪些服务将提供出来
     *
     * @return array
     */
    public function provides(): array
    {
        return ['Qiniu'];
    }
}
