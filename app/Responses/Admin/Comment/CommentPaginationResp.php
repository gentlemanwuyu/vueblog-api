<?php
/**
 * 评论分页响应类
 * User: Woozee
 * Date: 2020/12/7
 * Time: 16:25
 */

namespace App\Responses\Admin\Comment;

use App\Responses\BasePaginationResp;

class CommentPaginationResp extends BasePaginationResp
{
    /** @var \App\Responses\Admin\Comment\CommentItem[] 列表数据 */
    public array $list;
}
