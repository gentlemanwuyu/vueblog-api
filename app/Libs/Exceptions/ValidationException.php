<?php
/**
 * 参数校验异常
 * User: Woozee
 * Date: 2020/10/25
 * Time: 18:48
 */

namespace App\Libs\Exceptions;


class ValidationException extends BaseException
{
    public function __construct(string $message = '', int $code = 422, int $httpCode = 422, \Throwable $previous = null)
    {
        parent::__construct($message, $code, $httpCode, $previous);
    }

    public function report(): void
    {

    }
}
