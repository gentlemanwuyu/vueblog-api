<?php
/**
 * 统计控制器
 * User: Woozee
 * Date: 2020/12/27
 * Time: 12:43
 */

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BaseController;
use App\Responses\Admin\Statistics\HomeStatisticsResp;
use App\Services\StatisticsService;

class StatisticsController extends BaseController
{
    protected StatisticsService $statisticsService;

    public function __construct(StatisticsService $statisticsService)
    {
        $this->statisticsService = $statisticsService;
    }

    /**
     * @apidoc 首页统计 | Admin
     * @return \Illuminate\Http\JsonResponse
     */
    public function home()
    {
        $pv = $this->statisticsService->getPv();
        $uv = $this->statisticsService->getUv();
        $newComment = $this->statisticsService->getNewComment();
        $pendingReplyComment = $this->statisticsService->getPendingReplyComment();
        $resp = new HomeStatisticsResp();
        $resp->pv = $pv;
        $resp->uv = $uv;
        $resp->new_comment = $newComment;
        $resp->pending_reply_comment = $pendingReplyComment;

        return \ApiResponse::success($resp);
    }
}
