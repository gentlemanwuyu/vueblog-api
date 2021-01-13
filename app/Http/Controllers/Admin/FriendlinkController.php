<?php
/**
 * 友情链接控制器
 * User: Woozee
 * Date: 2020/10/30
 * Time: 9:27
 */

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BaseController;
use App\Http\Requests\Admin\FriendlinkRequest;
use App\Services\FriendlinkService;
use Illuminate\Http\Request;

class FriendlinkController extends BaseController
{
    protected FriendlinkService $friendLinkService;

    public function __construct(FriendlinkService $friendLinkService)
    {
        $this->friendLinkService = $friendLinkService;
    }

    /**
     * @apidoc 友情列表 | Admin
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function list(Request $request)
    {
        $resp = $this->friendLinkService->getList($request);

        return \ApiResponse::success($resp);
    }

    /**
     * @apidoc 新增友情链接 | Admin
     * @param FriendlinkRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function add(FriendlinkRequest $request)
    {
        $this->friendLinkService->save($request);

        return \ApiResponse::success();
    }

    /**
     * @apidoc 编辑友情链接 | Admin
     * @param FriendlinkRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function edit(FriendlinkRequest $request)
    {
        $this->friendLinkService->save($request);

        return \ApiResponse::success();
    }

    /**
     * @apidoc 删除友情链接 | Admin
     * @return \Illuminate\Http\JsonResponse
     * @throws \App\Libs\Exceptions\BusinessException
     */
    public function delete()
    {
        $this->friendLinkService->delete(request('id'));

        return \ApiResponse::success();
    }
}
