<?php
/**
 * 系统控制器
 * User: Woozee
 * Date: 2020/12/13
 * Time: 0:04
 */

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BaseController;
use App\Http\Requests\Admin\SystemConfigRequest;
use App\Services\SystemService;

class SystemController extends BaseController
{
    protected SystemService $systemService;

    public function __construct(SystemService $systemService)
    {
        $this->systemService = $systemService;
    }

    /**
     * @apidoc 系统配置 | Admin
     * @return \Illuminate\Http\JsonResponse
     */
    public function config()
    {
        $resp = $this->systemService->getConfig();

        return \ApiResponse::success($resp);
    }

    /**
     * @apidoc 保存系统配置 | Admin
     * @param SystemConfigRequest $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \App\Libs\Exceptions\FatalErrorException
     * @throws \Throwable
     */
    public function saveConfig(SystemConfigRequest $request)
    {
        $this->systemService->saveConfig($request);

        return \ApiResponse::success();
    }

    /**
     * @apidoc 上传文章图片 | Admin
     * @return \Illuminate\Http\JsonResponse
     * @throws \App\Libs\Exceptions\BusinessException
     */
    public function upload()
    {
        $resp = $this->systemService->upload(request()->file('file'));

        return \ApiResponse::success($resp);
    }
}
