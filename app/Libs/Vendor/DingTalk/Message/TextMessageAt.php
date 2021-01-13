<?php
/**
 * Created by PhpStorm
 * User: Woozee
 * Date: 2020/12/18
 * Time: 23:23
 */

namespace App\Libs\Vendor\DingTalk\Message;


class TextMessageAt extends \App\Libs\Base\BaseFillable
{
    /** @var string[] 需要@的用户 */
    public array $atMobiles;

    /** @var bool 是否@所有 */
    public bool $isAtAll;
}
