<?php
/**
 * 鉴权控制器
 * User: Woozee
 * Date: 2020/10/7
 * Time: 13:02
 */

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BaseController;
use App\Http\Requests\Admin\LoginRequest;
use App\Libs\Exceptions\BusinessException;

class AuthController extends BaseController
{

    /**
     * @apidoc 登入 | Admin
     * @param LoginRequest $request
     * @return \Illuminate\Http\JsonResponse
     * @throws BusinessException
     */
    public function login(LoginRequest $request)
    {
        if (!\Auth::attempt([
            'name' => $request->get('username'),
            'password' => $request->get('password')
        ])) {
            throw new BusinessException("用户名或密码不正确");
        }

        return \ApiResponse::success();
    }
}
