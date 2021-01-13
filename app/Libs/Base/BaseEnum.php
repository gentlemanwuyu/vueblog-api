<?php
/**
 * 枚举基类
 * User: Woozee
 * Date: 2020/10/7
 * Time: 19:41
 */

namespace App\Libs\Base;


abstract class BaseEnum
{
    protected const TEXT = [];

    public static function getTexts(): array
    {
        return static::TEXT;
    }

    public static function getKeys()
    {
        return array_keys(static::TEXT);
    }

    public static function getText($key)
    {
        return static::TEXT[$key] ?? '';
    }
}
