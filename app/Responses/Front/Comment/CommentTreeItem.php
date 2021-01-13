<?php
/**
 * 评论树Item
 * User: Woozee
 * Date: 2020/12/14
 * Time: 21:51
 */

namespace App\Responses\Front\Comment;


class CommentTreeItem extends \App\Responses\BaseResp
{
    /** @var int ID */
    public int $id;

    /** @var int 文章ID */
    public int $article_id;

    /** @var string 评论内容 */
    public string $content;

    /** @var string 用户名 */
    public string $username;

    /** @var string 用户链接 */
    public string $link;

    /** @var string 头像地址 */
    public string $avatar;

    /** @var int 父评论ID */
    public int $parent_id;

    /** @var CommentParentInfo 父评论ID */
    public ?CommentParentInfo $parent = null;

    /** @var int 是否博主 */
    public int $is_master;

    /** @var int 评论层级 */
    public int $level;

    /** @var string 创建时间 */
    public string $created_at;

    /** @var CommentTreeItem[] 子评论 */
    public array $children;
}
