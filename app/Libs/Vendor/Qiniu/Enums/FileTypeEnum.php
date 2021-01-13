<?php
/**
 * 文件类型枚举
 * User: Woozee
 * Date: 2020/11/21
 * Time: 22:09
 */

namespace App\Libs\Vendor\Qiniu\Enums;

use App\Libs\Base\BaseEnum;

class FileTypeEnum extends BaseEnum
{
    const STANDARD = 0;
    const LOW_FREQUENCY = 1;
    const ARCHIVE = 2;

    protected const TEXT = [
        self::STANDARD => '标准存储',
        self::LOW_FREQUENCY => '低频存储',
        self::ARCHIVE => '归档存储',
    ];
}
