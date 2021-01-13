<?php
/**
 * 文章详情
 * User: Woozee
 * Date: 2020/12/20
 * Time: 14:19
 */

namespace App\Responses\Front\Article;

use App\Responses\Front\Label\LabelCloudItem;

class ArticleDetailResp extends \App\Responses\BaseResp
{
    /** @var int ID */
    public int $id;

    /** @var string 标题 */
    public string $title;

    /** @var string 内容 */
    public string $content;

    /** @var string 概要 */
    public string $summary;

    /** @var int 分类id */
    public int $category_id;

    /** @var string 分类名称 */
    public ?string $category_name = null;

    /** @var string[] 关键词 */
    public array $keyword_list;

    /** @var LabelCloudItem[] 标签 */
    public array $label_list;

    /** @var string 创建时间 */
    public string $created_at;

    /** @var int 浏览量 */
    public int $views;

    /** @var int 评论条数 */
    public int $comments_count;

    /** @var ArticleHotItem 上一篇 */
    public ?ArticleHotItem $previous = null;

    /** @var ArticleHotItem 下一篇 */
    public ?ArticleHotItem $next = null;
}
