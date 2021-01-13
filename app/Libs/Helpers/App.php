<?php
/**
 * App帮助类
 * User: Woozee
 * Date: 2020/10/7
 * Time: 20:25
 */

namespace App\Libs\Helpers;

class App
{
    /**
     * 是否是调试模式
     *
     * @return bool
     */
    public static function isDebug(): bool
    {
        return (bool)config('app.debug', false);
    }

    /**
     * 是否是线上环境
     *
     * @return bool
     */
    public static function isProduction(): bool
    {
        return (bool)(config('app.env') === 'production');
    }

    /**
     * 是否是线上环境
     *
     * @return bool
     */
    public static function isLocal(): bool
    {
        return (bool)(config('app.env') === 'local');
    }

    /**
     * 是否客户端
     *
     * @return bool
     */
    public static function isCli(): bool
    {
        return in_array(php_sapi_name(), ['cli', 'phpdb']);
    }

    /**
     * 获取应用程序的key
     *
     * @return string
     */
    public static function getKey(): string
    {
        return config('app.key');
    }

    /**
     * 获取异常消息内容
     *
     * @param \Throwable $e
     * @param int $maxLine
     * @return string
     */
    public static function getExceptionContent(\Throwable $e, int $maxLine = 10): string
    {
        $data = explode("\n", $e->__toString(), $maxLine + 1);
        count($data) > 1 && array_pop($data);

        return implode(PHP_EOL, $data);
    }
}
