<?php
/**
 * Http响应状态码
 * User: Woozee
 * Date: 2020/11/22
 * Time: 22:31
 */

namespace App\Libs\Vendor\Qiniu\Enums;

use App\Libs\Base\BaseEnum;

class HttpCodeEnum extends BaseEnum
{
    const OK = 200;
    const PARAMS_ERROR = 400;
    const UNAUTHORIZED = 401;
    const SERVER_ERROR = 599;
    const NOT_FOUND = 612;

    protected const TEXT = [
        self::OK => '请求成功',
        self::PARAMS_ERROR => '请求报文格式错误',
        self::UNAUTHORIZED => '管理凭证无效',
        self::SERVER_ERROR => '服务端操作失败',
        self::NOT_FOUND => '待删除资源不存在',
    ];
}
