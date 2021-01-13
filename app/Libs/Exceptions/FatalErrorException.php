<?php
/**
 * 致命异常
 * User: Woozee
 * Date: 2020/10/10
 * Time: 16:13
 */

namespace App\Libs\Exceptions;

use App\Libs\Helpers\Logger;

class FatalErrorException extends BaseException
{
    public function __construct($message = "", $code = 500, $httpCode = 500, \Throwable $previous = null)
    {
        parent::__construct($message, $code, $httpCode, $previous);
    }

    public function report(): void
    {
        //记录异常日志
        Logger::fatal()->error($this->getExceptionContent());
    }
}
