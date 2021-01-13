<?php
/**
 * 响应Code枚举
 * User: Woozee
 * Date: 2020/10/7
 * Time: 19:40
 */

namespace App\Libs\Response\Enums;

use App\Libs\Base\BaseEnum;

class CodeBaseEnum extends BaseEnum
{
    /** @var int 正常响应码 */
    const OK = 0;

    /** @var int 程序内部错误 */
    const INTERNAL_ERROR = 1000;
}
