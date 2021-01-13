<?php
/**
 * 前端文章控制器
 * User: Woozee
 * Date: 2020/12/12
 * Time: 11:50
 */

namespace App\Http\Controllers\Front;

use App\Responses\Front\Article\ArticleHotResp;
use App\Responses\Front\Article\ArticleNewResp;
use App\Services\ArticleService;
use Illuminate\Http\Request;

class ArticleController extends BaseFrontController
{
    protected ArticleService $articleService;

    public function __construct(ArticleService $articleService)
    {
        $this->articleService = $articleService;
    }

    /**
     * @apidoc 热门文章 | Front
     * @return \Illuminate\Http\JsonResponse
     */
    public function hot()
    {
        $list = $this->articleService->getHot();
        $resp = new ArticleHotResp();
        $resp->list = $list;

        return \ApiResponse::success($resp);
    }

    /**
     * @apidoc 最新文章 | Front
     * @return \Illuminate\Http\JsonResponse
     */
    public function new()
    {
        $list = $this->articleService->getNew();
        $resp = new ArticleNewResp();
        $resp->list = $list;

        return \ApiResponse::success($resp);
    }

    /**
     * @apidoc 文章列表 | Front
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function list(Request $request)
    {
        $resp = $this->articleService->getFrontList($request);

        return \ApiResponse::success($resp);
    }

    /**
     * @apidoc 文章详情 | Front
     * @return \Illuminate\Http\JsonResponse
     * @throws \App\Libs\Exceptions\BusinessException
     */
    public function detail()
    {
        $resp = $this->articleService->getFrontDetail(request('id'));

        return \ApiResponse::success($resp);
    }
}
