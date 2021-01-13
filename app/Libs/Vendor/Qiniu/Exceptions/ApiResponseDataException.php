<?php
/**
 * 七牛云响应数据异常类
 * User: Woozee
 * Date: 2020/11/21
 * Time: 22:35
 */

namespace App\Libs\Vendor\Qiniu\Exceptions;

use App\Libs\Exceptions\FatalErrorException;
use App\Libs\Helpers\Logger;

class ApiResponseDataException extends FatalErrorException
{
    public function __construct($message = "七牛云接口响应数据结构异常")
    {
        parent::__construct($message, 500, 500);
    }

    public function report(): void
    {
        //记录异常日志
        Logger::qiniu()->error($this->getExceptionContent());
    }
}
