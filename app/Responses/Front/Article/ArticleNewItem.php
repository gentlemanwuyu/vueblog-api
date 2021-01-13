<?php
/**
 * 最新文章
 * User: Woozee
 * Date: 2020/12/12
 * Time: 16:37
 */

namespace App\Responses\Front\Article;


class ArticleNewItem extends \App\Responses\BaseResp
{
    /** @var int ID */
    public int $id;

    /** @var string 文章标题 */
    public string $title;

    /** @var string 文章简介 */
    public string $summary;

    /** @var string 分类名 */
    public string $category_name;

    /** @var string 创建时间 */
    public string $created_at;

    /** @var int 评论数量 */
    public int $comment_number = 0;

    /** @var int 浏览量 */
    public int $views = 0;

    /** @var string 图片链接 */
    public string $image_url;
}
