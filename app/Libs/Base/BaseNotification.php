<?php
/**
 * 消息通知基类
 * User: Woozee
 * Date: 2021/1/9
 * Time: 16:45
 */

namespace App\Libs\Base;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Notification;

abstract class BaseNotification extends Notification implements ShouldQueue
{
    use Queueable;

    /** @var int 重试次数 */
    public int $tries = 5;
}
