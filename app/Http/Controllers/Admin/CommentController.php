<?php
/**
 * 评论控制器
 * User: Woozee
 * Date: 2020/12/7
 * Time: 16:21
 */

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BaseController;
use App\Services\CommentService;
use Illuminate\Http\Request;

class CommentController extends BaseController
{
    protected CommentService $commentService;

    public function __construct(CommentService $commentService)
    {
        $this->commentService = $commentService;
    }

    /**
     * @apidoc 评论列表 | Admin
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function list(Request $request)
    {
        $resp = $this->commentService->getList($request);

        return \ApiResponse::success($resp);
    }

    /**
     * @apidoc 删除评论 | Admin
     * @return \Illuminate\Http\JsonResponse
     * @throws \App\Libs\Exceptions\BusinessException
     */
    public function delete()
    {
        $this->commentService->delete(request('id'));

        return \ApiResponse::success();
    }
}
