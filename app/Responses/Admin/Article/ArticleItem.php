<?php
/**
 * 文章Item
 * User: Woozee
 * Date: 2020/11/29
 * Time: 21:01
 */

namespace App\Responses\Admin\Article;

use App\Responses\Admin\Category\CategoryInfo;
use App\Responses\Admin\Label\LabelItem;
use App\Responses\BaseResp;

class ArticleItem extends BaseResp
{
    /** @var int ID */
    public int $id;

    /** @var string 标题 */
    public string $title;

    /** @var string[] 关键词 */
    public array $keyword_list;

    /** @var LabelItem[] 标签 */
    public array $label_list;

    /** @var CategoryInfo 分类 */
    public CategoryInfo $category;

    /** @var string 创建时间 */
    public string $created_at;

    /** @var string 更新时间 */
    public string $updated_at;
}
