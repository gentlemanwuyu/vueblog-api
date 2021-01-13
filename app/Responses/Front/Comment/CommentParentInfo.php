<?php
/**
 * Created by PhpStorm
 * User: Woozee
 * Date: 2020/12/21
 * Time: 13:24
 */

namespace App\Responses\Front\Comment;


class CommentParentInfo extends \App\Responses\BaseResp
{
    /** @var int ID */
    public int $id;

    /** @var string 用户名 */
    public string $username;
}
