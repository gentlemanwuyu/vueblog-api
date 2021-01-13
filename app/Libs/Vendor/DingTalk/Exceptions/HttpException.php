<?php
/**
 * 钉钉http响应错误
 * User: Woozee
 * Date: 2020/12/18
 * Time: 23:45
 */

namespace App\Libs\Vendor\DingTalk\Exceptions;

use App\Libs\Helpers\Logger;

class HttpException extends \App\Libs\Exceptions\BaseException
{
    public function __construct($message = "", $code = 500, $httpCode = 500, \Throwable $previous = null)
    {
        parent::__construct($message, $code, $httpCode, $previous);
    }

    public function report(): void
    {
        //记录异常日志
        Logger::ding()->error($this->getExceptionContent());
    }
}
