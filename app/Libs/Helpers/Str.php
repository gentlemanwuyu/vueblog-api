<?php
/**
 * 字符串帮助类
 * User: Woozee
 * Date: 2020/12/23
 * Time: 21:57
 */

namespace App\Libs\Helpers;

/**
 * Class Str
 * @package App\Libs\Helpers
 * @mixin \Illuminate\Support\Str
 */
class Str extends \Illuminate\Support\Str
{
    /**
     * 缩短字符串
     *
     * @param string $str
     * @param int $maxLength
     * @param string $overflowText
     * @return string
     */
    public static function shorten(string $str, $maxLength = 10, $overflowText = '...'): string
    {
        if (!$str || !is_string($str)) {
            return '';
        }
        if (strlen($str) <= $maxLength) {
            return $str;
        }
        $remain = mb_substr($str, 0, $maxLength);
        return $remain . $overflowText;
    }
}
