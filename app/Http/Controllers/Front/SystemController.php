<?php
/**
 * 系统控制器
 * User: Woozee
 * Date: 2020/12/13
 * Time: 1:59
 */

namespace App\Http\Controllers\Front;

use App\Services\SystemService;

class SystemController extends BaseFrontController
{
    protected SystemService $systemService;

    public function __construct(SystemService $systemService)
    {
        $this->systemService = $systemService;
    }

    /**
     * @apidoc 关于 | Front
     * @return \Illuminate\Http\JsonResponse
     */
    public function about()
    {
        $about = $this->systemService->getAbout();

        return \ApiResponse::success($about);
    }

    /**
     * @apidoc 系统配置 | Front
     * @return \Illuminate\Http\JsonResponse
     */
    public function config()
    {
        $resp = $this->systemService->getFrontConfig();

        return \ApiResponse::success($resp);
    }
}
