<?php
/**
 * API响应错误
 * User: Woozee
 * Date: 2020/11/22
 * Time: 21:30
 */

namespace App\Libs\Vendor\Qiniu\Exceptions;

use App\Libs\Exceptions\FatalErrorException;
use App\Libs\Helpers\Logger;

class ApiResponseErrorException extends FatalErrorException
{
    public function __construct($message = "七牛云接口响应错误")
    {
        parent::__construct($message, 500, 500);
    }

    public function report(): void
    {
        //记录异常日志
        Logger::qiniu()->error($this->getExceptionContent());
    }
}
