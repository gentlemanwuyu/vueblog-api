<?php
/**
 * 未授权异常
 * User: Woozee
 * Date: 2020/10/10
 * Time: 16:28
 */

namespace App\Libs\Exceptions;


class UnauthorizedException extends BaseException
{
    public function __construct($message = "", $code = 401, $httpCode = 401, \Throwable $previous = null)
    {
        parent::__construct($message, $code, $httpCode, $previous);
    }

    public function report(): void
    {

    }
}
