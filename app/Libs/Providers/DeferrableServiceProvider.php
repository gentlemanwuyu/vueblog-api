<?php
/**
 * 延时服务提供者
 * User: Woozee
 * Date: 2020/10/7
 * Time: 19:05
 */

namespace App\Libs\Providers;

use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;
use App\Libs\Response\ApiResponse;

class DeferrableServiceProvider extends ServiceProvider implements DeferrableProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //前端响应对象
        $this->app->bind('ApiResponse', function() {
            return new ApiResponse();
        });
    }

    /**
     * 哪些服务将提供出来
     *
     * @return array
     */
    public function provides(): array
    {
        return ['ApiResponse'];
    }
}
