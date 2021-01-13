<?php
/**
 * 分类服务类
 * User: Woozee
 * Date: 2020/10/29
 * Time: 13:41
 */

namespace App\Services;

use App\Enum\Qiniu\KeyPrefixEnum;
use App\Http\Requests\Admin\CategoryRequest;
use App\Libs\Exceptions\BusinessException;
use App\Libs\Helpers\Arr;
use App\Models\Article;
use App\Models\Category;
use App\Responses\Admin\Category\CategoryTreeResp;
use App\Responses\Admin\Qiniu\QiniuUploadResp;
use Illuminate\Http\UploadedFile;

class CategoryService extends BaseService
{
    protected QiniuService $qiniuService;

    public function __construct(QiniuService $qiniuService)
    {
        $this->qiniuService = $qiniuService;
    }

    /**
     * 分类树
     *
     * @return CategoryTreeResp[]
     */
    public function getTree(): array
    {
        $categoryList = Category::with(['image'])->get();
        $tree = Arr::toTree($categoryList->toArray());

        return CategoryTreeResp::fromList($tree);
    }

    /**
     * @apidoc
     * @return \App\Responses\Front\Category\CategoryTreeResp[]
     */
    public function getFrontTree()
    {
        $categoryList = Category::all();
        $tree = Arr::toTree($categoryList->toArray(), 'id', 'parent_id', 0, 'children', 2);

        return \App\Responses\Front\Category\CategoryTreeResp::fromList($tree);
    }

    /**
     * 保存分类
     *
     * @param CategoryRequest $request
     */
    public function save(CategoryRequest $request): void
    {
        if ($id = $request->get('id')) {
            $category = Category::find($id);
        }else {
            $category = new Category();
        }
        $category->name = $request->get('name');
        $category->image_id = $request->get('image_id');
        if ($parentId = $request->get('parent_id')) {
            $category->parent_id = $parentId;
        }
        $category->save();
    }

    /**
     * 删除分类
     *
     * @param int $id
     * @throws BusinessException
     * @throws \Exception
     */
    public function delete(int $id): void
    {
        $category = Category::find($id);
        if (!$category) {
            throw new BusinessException("分类不存在");
        }
        // 查询是否有子分类
        if (Category::where('parent_id', $id)->exists()) {
            throw new BusinessException("该分类下还有子分类，不能删除");
        }
        if (Article::where('category_id', $id)->exists()) {
            throw new BusinessException("该分类下还有文章，不能删除");
        }
        $category->delete();
    }

    /**
     * 上传文件
     *
     * @param UploadedFile $file
     * @return QiniuUploadResp
     * @throws BusinessException
     * @throws \Exception
     */
    public function upload(UploadedFile $file): QiniuUploadResp
    {
        return $this->qiniuService->upload($file, KeyPrefixEnum::CATEGORY);
    }

    /**
     * 获取所有子分类ID
     *
     * @param int $id
     * @return array
     */
    public function getChildrenIdList(int $id): array
    {
        $categoryList = Category::all(['id', 'parent_id'])->toArray();

        return Arr::getChildrenKeys($categoryList, $id);
    }
}
