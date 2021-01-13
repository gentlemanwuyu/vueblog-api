<?php
/**
 * Text类型消息
 * User: Woozee
 * Date: 2020/12/18
 * Time: 23:16
 */

namespace App\Libs\Vendor\DingTalk\Message;


class TextMessage extends \App\Libs\Base\BaseFillable
{
    /** @var string 消息类型 */
    public string $msgtype = 'text';

    /** @var TextMessageText 内容 */
    public TextMessageText $text;

    /** @var TextMessageAt @设置 */
    public TextMessageAt $at;
}
