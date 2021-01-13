<?php
/**
 * 分类控制器
 * User: Woozee
 * Date: 2020/10/29
 * Time: 13:40
 */

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BaseController;
use App\Http\Requests\Admin\CategoryRequest;
use App\Services\CategoryService;

class CategoryController extends BaseController
{
    protected CategoryService $categoryService;

    public function __construct(CategoryService $categoryService)
    {
        $this->categoryService = $categoryService;
    }

    /**
     * @apidoc 分类树 | Admin
     * @return \Illuminate\Http\JsonResponse
     */
    public function tree()
    {
        $tree = $this->categoryService->getTree();

        return \ApiResponse::success($tree);
    }

    /**
     * @apidoc 新增分类 | Admin
     * @param CategoryRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function add(CategoryRequest $request)
    {
        $this->categoryService->save($request);

        return \ApiResponse::success();
    }

    /**
     * @apidoc 编辑分类 | Admin
     * @param CategoryRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function edit(CategoryRequest $request)
    {
        $this->categoryService->save($request);

        return \ApiResponse::success();
    }

    /**
     * @apidoc 删除分类 | Admin
     * @return \Illuminate\Http\JsonResponse
     * @throws \App\Libs\Exceptions\BusinessException
     */
    public function delete()
    {
        $this->categoryService->delete(request('id'));

        return \ApiResponse::success();
    }

    /**
     * @apidoc 上传分类图片 | Admin
     * @return \Illuminate\Http\JsonResponse
     * @throws \App\Libs\Exceptions\BusinessException
     */
    public function upload()
    {
        $resp = $this->categoryService->upload(request()->file('file'));

        return \ApiResponse::success($resp);
    }
}
