<?php
/**
 * 前端标签控制器
 * User: Woozee
 * Date: 2020/12/11
 * Time: 23:23
 */

namespace App\Http\Controllers\Front;

use App\Responses\Front\Label\LabelCloudResp;
use App\Services\LabelService;

class LabelController extends BaseFrontController
{
    protected LabelService $labelService;

    public function __construct(LabelService $labelService)
    {
        $this->labelService = $labelService;
    }

    /**
     * @apidoc 标签云 | Front
     * @return \Illuminate\Http\JsonResponse
     */
    public function cloud()
    {
        $list = $this->labelService->getCloud();
        $resp = new LabelCloudResp();
        $resp->list = $list;

        return \ApiResponse::success($resp);
    }
}
