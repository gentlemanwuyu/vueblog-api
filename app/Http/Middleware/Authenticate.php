<?php

namespace App\Http\Middleware;

use App\Libs\Helpers\App;
use App\Libs\Exceptions\UnauthorizedException;
use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    /**
     * @apidoc
     * @param \Illuminate\Http\Request $request
     * @param array $guards
     * @throws UnauthorizedException
     */
    protected function authenticate($request, array $guards)
    {
        if (empty($guards)) {
            $guards = [null];
        }

        foreach ($guards as $guard) {
            if ($this->auth->guard($guard)->check()) {
                $this->auth->shouldUse($guard);
                return;
            }
        }

        if (App::isLocal()) {
            // 本地环境下自动登录
            \Auth::attempt(['name' => 'admin', 'password' => 'admin']);
        }else {
            $this->unauthenticated($request, $guards);
        }
    }

    /**
     * 未授权抛异常
     *
     * @param \Illuminate\Http\Request $request
     * @param array $guards
     * @throws UnauthorizedException
     */
    protected function unauthenticated($request, array $guards)
    {
        throw new UnauthorizedException("请登录");
    }
}
