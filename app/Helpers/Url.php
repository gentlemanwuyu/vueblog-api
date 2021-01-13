<?php
/**
 * Url帮助类
 * User: Woozee
 * Date: 2020/12/8
 * Time: 22:20
 */

namespace App\Helpers;

class Url
{
    public static function getQiniuUrl(string $key): string
    {
        $domain = trim(config('qiniu.domain'), '/');

        return "{$domain}/" . trim($key, '/');
    }
}
