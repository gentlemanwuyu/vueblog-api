<?php
/**
 * Api响应门面类
 * User: Woozee
 * Date: 2020/10/7
 * Time: 19:09
 */

namespace App\Libs\Facades;

use Illuminate\Support\Facades\Facade;

class ApiResponse extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'ApiResponse';
    }
}
