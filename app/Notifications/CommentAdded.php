<?php

namespace App\Notifications;

use App\Libs\Base\BaseNotification;
use App\Notifications\Channels\DingTalk;

class CommentAdded extends BaseNotification
{
    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return [DingTalk::class];
    }
}
