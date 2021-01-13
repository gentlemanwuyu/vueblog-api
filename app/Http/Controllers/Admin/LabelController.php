<?php
/**
 * 标签控制器
 * User: Woozee
 * Date: 2020/10/29
 * Time: 16:00
 */

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BaseController;
use App\Http\Requests\Admin\LabelRequest;
use App\Responses\Admin\Label\LabelAllResp;
use App\Services\LabelService;
use Illuminate\Http\Request;

class LabelController extends BaseController
{
    protected LabelService $labelService;

    public function __construct(LabelService $labelService)
    {
        $this->labelService = $labelService;
    }

    /**
     * @apidoc 标签列表 | Admin
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function list(Request $request)
    {
        $resp = $this->labelService->getList($request);

        return \ApiResponse::success($resp);
    }

    /**
     * @apidoc 新增标签 | Admin
     * @param LabelRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function add(LabelRequest $request)
    {
        $this->labelService->save($request);

        return \ApiResponse::success();
    }

    /**
     * @apidoc 编辑标签 | Admin
     * @param LabelRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function edit(LabelRequest $request)
    {
        $this->labelService->save($request);

        return \ApiResponse::success();
    }

    /**
     * @apidoc 删除标签 | Admin
     * @return \Illuminate\Http\JsonResponse
     * @throws \App\Libs\Exceptions\BusinessException
     */
    public function delete()
    {
        $this->labelService->delete(request('id'));

        return \ApiResponse::success();
    }

    /**
     * @apidoc 所有标签 | Admin
     * @return \Illuminate\Http\JsonResponse
     */
    public function all()
    {
        $allLabel = $this->labelService->getAll();
        $resp = new LabelAllResp();
        $resp->list = $allLabel;

        return \ApiResponse::success($resp);
    }
}
