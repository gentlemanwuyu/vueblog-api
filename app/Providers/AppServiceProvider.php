<?php

namespace App\Providers;

use App\Libs\Vendor\DingTalk\Config;
use App\Libs\Vendor\DingTalk\RobotSender;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(RobotSender::class, function () {
            $config = new Config();
            $config->url = config('ding.url');
            $config->accessToken = config('ding.access_token');
            $config->secret = config('ding.secret');

            return new RobotSender($config);
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
