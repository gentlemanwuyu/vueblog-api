<?php

namespace App\Exceptions;

use App\Libs\Exceptions\FatalErrorException;

class Handler extends \Illuminate\Foundation\Exceptions\Handler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];

    /**
     * 自定义错误报告
     *
     * @param \Throwable $e
     * @return mixed|void
     * @throws FatalErrorException
     */
    public function report(\Throwable $e)
    {
        if ($this->shouldntReport($e)) {
            return;
        }

        if (is_callable($reportCallable = [$e, 'report'])) {
            return $this->container->call($reportCallable);
        }

        throw new FatalErrorException($e->getMessage());
    }
}
