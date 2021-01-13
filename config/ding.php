<?php
/**
 * 钉钉配置
 * User: Woozee
 * Date: 2020/12/18
 * Time: 17:03
 */

return [
    // 是否开启钉钉通知
    'enabled' => env('DINGTALK_ENABLED', false),
    'url' => env('DINGTALK_ROBOT_URL'),
    'access_token' => env('DINGTALK_ROBOT_ACCESS_TOKEN'),
    'secret' => env('DINGTALK_ROBOT_SECRET'),
];
