<?php
/**
 * 七牛云是否启用枚举
 * User: Woozee
 * Date: 2020/11/21
 * Time: 22:03
 */

namespace App\Libs\Vendor\Qiniu\Enums;

use App\Libs\Base\BaseEnum;

class IsEnabledEnum extends BaseEnum
{
    const ENABLED = 0;
    const DISABLED = 1;

    protected const TEXT = [
        self::ENABLED => '启用',
        self::DISABLED => '禁用',
    ];
}
