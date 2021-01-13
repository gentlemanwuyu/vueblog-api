<?php
/**
 * 分类树
 * User: Woozee
 * Date: 2020/12/20
 * Time: 9:39
 */

namespace App\Responses\Front\Category;

use App\Responses\BaseResp;

class CategoryTreeResp extends BaseResp
{
    /** @var int ID */
    public int $id;

    /** @var string 分类名 */
    public string $name;

    /** @var int 父类ID */
    public int $parent_id;

    /** @var int 层级 */
    public int $level;

    /** @var \App\Responses\Front\Category\CategoryTreeResp[] 子分类 */
    public ?array $children;
}
