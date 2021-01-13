<?php
/**
 * 整形布尔值枚举
 * User: Woozee
 * Date: 2020/12/14
 * Time: 11:25
 */

namespace App\Enum;


class BoolIntEnum extends \App\Libs\Base\BaseEnum
{
    const FALSE = 0;
    const TRUE = 1;

    protected const TEXT = [
        self::FALSE => '否',
        self::TRUE => '是',
    ];
}
