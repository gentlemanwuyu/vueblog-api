<?php
/**
 * 钉钉频道
 * User: Woozee
 * Date: 2020/12/16
 * Time: 14:59
 */

namespace App\Notifications\Channels;

use App\Libs\Vendor\DingTalk\RobotSender;
use App\Notifications\Interfaces\ChannelInterface;
use Illuminate\Notifications\Notification;

class DingTalk implements ChannelInterface
{
    protected RobotSender $sender;

    public function __construct(RobotSender $sender)
    {
        $this->sender = $sender;
    }

    /**
     * 发送钉钉消息
     *
     * @param $notifiable
     * @param Notification $notification
     * @throws \App\Libs\Vendor\DingTalk\Exceptions\HttpException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function send($notifiable, Notification $notification): void
    {
        $message = $notifiable->getMessage();

        $this->sender->sendText($message);
    }
}
