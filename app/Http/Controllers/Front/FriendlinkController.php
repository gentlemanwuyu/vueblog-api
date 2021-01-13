<?php
/**
 * 友情链接控制器
 * User: Woozee
 * Date: 2020/12/12
 * Time: 17:51
 */

namespace App\Http\Controllers\Front;

use App\Responses\Front\Friendlink\FriendlinkListResp;
use App\Services\FriendlinkService;

class FriendlinkController extends BaseFrontController
{
    protected FriendlinkService $friendlinkService;

    public function __construct(FriendlinkService $friendlinkService)
    {
        $this->friendlinkService = $friendlinkService;
    }

    /**
     * @apidoc 所有友情链接 | Front
     * @return \Illuminate\Http\JsonResponse
     */
    public function list()
    {
        $list = $this->friendlinkService->getAll();
        $resp = new FriendlinkListResp();
        $resp->list = $list;

        return \ApiResponse::success($resp);
    }
}
