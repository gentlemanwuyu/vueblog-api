<?php
/**
 * 七牛云前缀枚举
 * User: Woozee
 * Date: 2020/12/8
 * Time: 22:07
 */

namespace App\Enum\Qiniu;


class KeyPrefixEnum extends \App\Libs\Base\BaseEnum
{
    const CATEGORY = 'category';
    const ARTICLE = 'article';
    const ABOUT = 'about';

    protected const TEXT = [
        self::CATEGORY => '分类',
        self::ARTICLE => '文章',
        self::ABOUT => '关于',
    ];
}
