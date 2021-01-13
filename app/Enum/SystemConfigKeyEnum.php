<?php
/**
 * 系统配置键值枚举
 * User: Woozee
 * Date: 2020/12/12
 * Time: 23:44
 */

namespace App\Enum;


class SystemConfigKeyEnum extends \App\Libs\Base\BaseEnum
{
    const NAME = 'name';
    const ADDRESS = 'address';
    const EMAIL = 'email';
    const TITLE = 'title';
    const KEYWORDS = 'keywords';
    const DESC = 'desc';
    const ABOUT = 'about';
    const ICP = 'icp';

    protected const TEXT = [
        self::NAME => '博客名',
        self::ADDRESS => '博客地址',
        self::EMAIL => '博主邮箱',
        self::TITLE => '博客标题',
        self::KEYWORDS => '关键字',
        self::DESC => '描述',
        self::ABOUT => '关于',
        self::ICP => 'ICP备案号',
    ];
}
