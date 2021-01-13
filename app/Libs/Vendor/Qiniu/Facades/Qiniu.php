<?php
/**
 * 七牛云门面类
 * User: Woozee
 * Date: 2020/11/21
 * Time: 13:29
 */

namespace App\Libs\Vendor\Qiniu\Facades;

use Illuminate\Support\Facades\Facade;

class Qiniu extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'Qiniu';
    }
}
