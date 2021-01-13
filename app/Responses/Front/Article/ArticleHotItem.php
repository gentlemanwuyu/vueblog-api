<?php
/**
 * 热门文章Item
 * User: Woozee
 * Date: 2020/12/12
 * Time: 12:03
 */

namespace App\Responses\Front\Article;


class ArticleHotItem extends \App\Responses\BaseResp
{
    /** @var int ID */
    public int $id;

    /** @var string 文章标题 */
    public string $title;

    /** @var int 浏览量 */
    public ?int $views = null;
}
