<?php
/**
 * 评论来源枚举
 * User: Woozee
 * Date: 2020/12/14
 * Time: 11:21
 */

namespace App\Enum\Comment;


class SourceEnum extends \App\Libs\Base\BaseEnum
{
    const ARTICLE = 1;
    const ABOUT = 2;

    protected const TEXT = [
        self::ARTICLE => '文章',
        self::ABOUT => '关于',
    ];
}
