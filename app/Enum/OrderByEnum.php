<?php
/**
 * 排序枚举
 * User: Woozee
 * Date: 2020/12/12
 * Time: 11:56
 */

namespace App\Enum;


class OrderByEnum extends \App\Libs\Base\BaseEnum
{
    const ASC = 'ASC';
    const DESC = 'DESC';

    protected const TEXT = [
        self::ASC => '顺序',
        self::DESC => '倒序',
    ];
}
