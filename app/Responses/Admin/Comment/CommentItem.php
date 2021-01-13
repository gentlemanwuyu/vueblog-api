<?php
/**
 * 评论Item响应类
 * User: Woozee
 * Date: 2020/12/7
 * Time: 16:26
 */

namespace App\Responses\Admin\Comment;


use App\Enum\Comment\SourceEnum;
use App\Responses\Admin\Article\ArticleItem;

class CommentItem extends \App\Responses\BaseResp
{
    /** @var int ID */
    public int $id;

    /** @var int 文章ID */
    public int $article_id;

    /** @var ArticleItem 文章 */
    public ArticleItem $article;

    /** @var string 评论内容 */
    public string $content;

    /** @var string 用户名 */
    public string $username;

    /** @var string 用户email */
    public string $email;

    /** @var string 用户链接 */
    public string $link;

    /** @var int 父评论ID */
    public int $parent_id;

    /** @var string|null 父评论内容 */
    public ?string $parent_content = null;

    /** @var int 子评论数量 */
    public int $children_count;

    /** @var int 是否博主 */
    public int $is_master;

    /** @var int 评论来源, 1为文章, 2为关于 */
    public int $source;

    /** @var string 评论来源文本 */
    public string $source_text;

    /** @var string 创建时间 */
    public string $created_at;

    /** @var string 更新时间 */
    public string $updated_at;

    protected function afterFill(): void
    {
        $this->source_text = SourceEnum::getText($this->source);
    }
}
