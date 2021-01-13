<?php
/**
 * 异常基类
 * User: Woozee
 * Date: 2020/10/7
 * Time: 20:14
 */

namespace App\Libs\Exceptions;

use App\Libs\Helpers\App;
use App\Libs\Helpers\Logger;
use Exception;

abstract class BaseException extends Exception
{
    /** @var int Http 状态码 */
    private int $httpCode;

    /**  @var object 异常数据 */
    protected $data;

    public function __construct(string $message = '', int $code = 500, int $httpCode = 500, \Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
        $this->httpCode = $httpCode;
    }

    /**
     * 错误报告, 所有异常都会到这个基类
     */
    public function report(): void
    {
        //记录异常日志
        Logger::exception()->error($this->getExceptionContent());
    }

    /**
     * 设置异常返回值
     *
     * @param $data
     */
    public function setData($data)
    {
        $this->data = $data;
    }


    /**
     * 出错时显示统一的JSON格式
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function render()
    {
        return \ApiResponse::error($this->getMessage(), $this->data, $this->getCode(), $this->httpCode);
    }

    /**
     * 最大异常显示行数
     *
     * @param int $maxLine
     * @return string
     */
    protected function getExceptionContent(int $maxLine = 8): string
    {
        return App::getExceptionContent($this, $maxLine);
    }
}
