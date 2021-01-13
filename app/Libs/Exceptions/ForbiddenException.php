<?php
/**
 * 禁止操作异常
 * User: Woozee
 * Date: 2020/10/10
 * Time: 16:25
 */

namespace App\Libs\Exceptions;

use App\Libs\Helpers\Logger;

class ForbiddenException extends BaseException
{
    public function __construct($message = "", $code = 403, $httpCode = 403, \Throwable $previous = null)
    {
        parent::__construct($message, $code, $httpCode, $previous);
    }

    public function report(): void
    {
        //记录异常日志
        Logger::auth()->warning("[Forbidden]{$this->getMessage()}");
    }
}
