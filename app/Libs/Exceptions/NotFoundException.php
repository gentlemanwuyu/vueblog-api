<?php
/**
 * 资源找不到异常
 * User: Woozee
 * Date: 2020/10/10
 * Time: 16:45
 */

namespace App\Libs\Exceptions;


class NotFoundException extends BaseException
{
    public function __construct($message = "", $code = 404, $httpCode = 404, \Throwable $previous = null)
    {
        parent::__construct($message, $code, $httpCode, $previous);
    }

    public function report(): void
    {

    }
}
