<?php
/**
 * 消息通道接口
 * User: Woozee
 * Date: 2020/12/16
 * Time: 15:02
 */

namespace App\Notifications\Interfaces;

use Illuminate\Notifications\Notification;

interface ChannelInterface
{
    public function send($notifiable, Notification $notification);
}
