<?php
/**
 * 前端分类控制器
 * User: Woozee
 * Date: 2020/12/20
 * Time: 9:33
 */

namespace App\Http\Controllers\Front;

use App\Services\CategoryService;

class CategoryController extends BaseFrontController
{
    protected CategoryService $categoryService;

    public function __construct(CategoryService $categoryService)
    {
        $this->categoryService = $categoryService;
    }

    /**
     * @apidoc 分类树 | Front
     * @return \Illuminate\Http\JsonResponse
     */
    public function tree()
    {
        $tree = $this->categoryService->getFrontTree();

        return \ApiResponse::success($tree);
    }
}
