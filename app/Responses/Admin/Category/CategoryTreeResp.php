<?php
/**
 * 分类树
 * User: Woozee
 * Date: 2020/10/29
 * Time: 15:01
 */

namespace App\Responses\Admin\Category;

use App\Responses\BaseResp;

class CategoryTreeResp extends BaseResp
{
    /** @var int ID */
    public int $id;

    /** @var string 分类名 */
    public string $name;

    /** @var int 父类ID */
    public int $parent_id;

    /** @var int 父类ID */
    public int $image_id;

    /** @var int 层级 */
    public int $level;

    /** @var CategoryImage 图片信息 */
    public CategoryImage $image;

    /** @var \App\Responses\Admin\Category\CategoryTreeResp[] 子分类 */
    public ?array $children;
}
