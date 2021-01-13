<?php
/**
 * 评论树响应类
 * User: Woozee
 * Date: 2020/12/14
 * Time: 21:51
 */

namespace App\Responses\Front\Comment;


class CommentTreeResp extends \App\Responses\BasePaginationResp
{
    /** @var \App\Responses\Front\Comment\CommentTreeItem[] 列表数据 */
    public array $list;

    /** @var int 评论总数量 */
    public int $comment_total;
}
