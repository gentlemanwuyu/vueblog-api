<?php
/**
 * 文章控制器
 * User: Woozee
 * Date: 2020/10/30
 * Time: 14:24
 */

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BaseController;
use App\Http\Requests\Admin\ArticleRequest;
use App\Services\ArticleService;
use Illuminate\Http\Request;

class ArticleController extends BaseController
{
    protected ArticleService $articleService;

    public function __construct(ArticleService $articleService)
    {
        $this->articleService = $articleService;
    }

    /**
     * @apidoc 文章列表 | Admin
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function list(Request $request)
    {
        $resp = $this->articleService->getList($request);

        return \ApiResponse::success($resp);
    }

    /**
     * @apidoc 新增文章 | Admin
     * @param ArticleRequest $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \App\Libs\Exceptions\FatalErrorException
     * @throws \Throwable
     */
    public function add(ArticleRequest $request)
    {
        $this->articleService->save($request);

        return \ApiResponse::success();
    }

    /**
     * @apidoc 编辑文章 | Admin
     * @param ArticleRequest $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \App\Libs\Exceptions\FatalErrorException
     * @throws \Throwable
     */
    public function edit(ArticleRequest $request)
    {
        $this->articleService->save($request);

        return \ApiResponse::success();
    }

    /**
     * @apidoc 删除文章 | Admin
     * @return \Illuminate\Http\JsonResponse
     * @throws \Throwable
     */
    public function delete()
    {
        $this->articleService->delete(request('id'));

        return \ApiResponse::success();
    }

    /**
     * @apidoc 文章详情 | Admin
     * @return \Illuminate\Http\JsonResponse
     * @throws \App\Libs\Exceptions\BusinessException
     */
    public function detail()
    {
        $detail = $this->articleService->getDetail(request('id'));

        return \ApiResponse::success($detail);
    }

    /**
     * @apidoc 上传文章图片 | Admin
     * @return \Illuminate\Http\JsonResponse
     * @throws \App\Libs\Exceptions\BusinessException
     */
    public function upload()
    {
        $resp = $this->articleService->upload(request()->file('file'));

        return \ApiResponse::success($resp);
    }
}
