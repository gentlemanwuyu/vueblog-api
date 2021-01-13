<?php
/**
 * Created by PhpStorm
 * User: Woozee
 * Date: 2020/12/16
 * Time: 15:15
 */

namespace App\Notifications\Notifiables;

use App\Libs\Vendor\DingTalk\Message\TextMessage;
use App\Libs\Vendor\DingTalk\Message\TextMessageAt;
use App\Libs\Vendor\DingTalk\Message\TextMessageText;

class CommentAddedNotifiable
{
    protected string $message;

    public function __construct(string $message)
    {
        $this->message = $message;
    }

    /**
     * 获取消息体
     *
     * @return TextMessage
     */
    public function getMessage(): TextMessage
    {
        $message = new TextMessage();
        $text = new TextMessageText();
        $text->content = $this->message;
        $at = new TextMessageAt();
        $at->isAtAll = true;
        $message->text = $text;
        $message->at = $at;

        return $message;
    }
}
