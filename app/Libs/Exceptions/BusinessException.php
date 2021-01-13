<?php
/**
 * 业务异常
 * User: Woozee
 * Date: 2020/10/10
 * Time: 16:24
 */

namespace App\Libs\Exceptions;


class BusinessException extends BaseException
{
    public function __construct($message = "", $code = 400, $httpCode = 400, \Throwable $previous = null)
    {
        parent::__construct($message, $code, $httpCode, $previous);
    }

    public function report(): void
    {

    }
}
