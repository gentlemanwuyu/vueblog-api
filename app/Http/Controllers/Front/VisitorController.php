<?php
/**
 * 访客控制器
 * User: Woozee
 * Date: 2020/12/20
 * Time: 21:56
 */

namespace App\Http\Controllers\Front;

use App\Services\VisitorService;
use Illuminate\Http\Request;

class VisitorController extends BaseFrontController
{
    protected VisitorService $visitorService;

    public function __construct(VisitorService $visitorService)
    {
        $this->visitorService = $visitorService;
    }

    /**
     * @apidoc 上报访客数据 | Front
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \App\Libs\Exceptions\FatalErrorException
     * @throws \Throwable
     */
    public function track(Request $request)
    {
        $this->visitorService->track($request);

        return \ApiResponse::success();
    }
}
