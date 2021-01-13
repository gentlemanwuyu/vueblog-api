<?php
/**
 * 七牛云配置数据
 * User: Woozee
 * Date: 2020/11/21
 * Time: 14:18
 */

return [
    'access_key' => env('QINIU_ACCESS_KEY'),
    'secret_key' => env('QINIU_SECRET_KEY'),
    'bucket' => env('QINIU_BUCKET'),
    'domain' => env('QINIU_DOMAIN'),
];
