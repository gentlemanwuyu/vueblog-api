<?php
/**
 * 日志帮助类
 * User: Woozee
 * Date: 2020/10/7
 * Time: 20:22
 */

namespace App\Libs\Helpers;

class Logger
{
    public static function exception()
    {
        return \Log::channel(__FUNCTION__);
    }

    public static function fatal()
    {
        return \Log::channel(__FUNCTION__);
    }

    public static function qiniu()
    {
        return \Log::channel(__FUNCTION__);
    }

    public static function auth()
    {
        return \Log::channel(__FUNCTION__);
    }

    public static function ding()
    {
        return \Log::channel(__FUNCTION__);
    }
}
