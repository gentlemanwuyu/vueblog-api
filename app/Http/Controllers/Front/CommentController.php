<?php
/**
 * 前端评论控制器
 * User: Woozee
 * Date: 2020/12/14
 * Time: 9:49
 */

namespace App\Http\Controllers\Front;

use App\Http\Requests\Front\CommentRequest;
use App\Services\CommentService;
use Illuminate\Http\Request;

class CommentController extends BaseFrontController
{
    protected CommentService $commentService;

    public function __construct(CommentService $commentService)
    {
        $this->commentService = $commentService;
    }

    /**
     * @apidoc 添加评论 | Front
     * @param CommentRequest $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \App\Libs\Exceptions\FatalErrorException
     */
    public function add(CommentRequest $request)
    {
        $this->commentService->add($request);

        return \ApiResponse::success();
    }

    /**
     * @apidoc 评论列表 | Front
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function list(Request $request)
    {
        $resp = $this->commentService->getTree($request);

        return \ApiResponse::success($resp);
    }
}
