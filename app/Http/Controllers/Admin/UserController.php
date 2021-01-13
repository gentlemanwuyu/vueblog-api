<?php
/**
 * 用户控制器
 * User: Woozee
 * Date: 2020/10/27
 * Time: 17:12
 */

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BaseController;
use App\Responses\Admin\User\DetailResp;

class UserController extends BaseController
{
    /**
     * @apidoc 用户详情 | Admin
     * @return \Illuminate\Http\JsonResponse
     */
    public function detail()
    {
        $detail = new DetailResp(\Auth::user());

        return \ApiResponse::success($detail);
    }
}
