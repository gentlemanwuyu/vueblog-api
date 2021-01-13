<?php
/**
 * 分类信息类
 * User: Woozee
 * Date: 2020/11/29
 * Time: 21:07
 */

namespace App\Responses\Admin\Category;

use App\Responses\BaseResp;

class CategoryInfo extends BaseResp
{
    /** @var int ID */
    public int $id;

    /** @var string 分类名 */
    public string $name;

    /** @var int 父类ID */
    public int $parent_id;

    /** @var CategoryInfo 父分类信息  */
    public ?CategoryInfo $parent = null;
}
