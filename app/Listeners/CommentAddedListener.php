<?php

namespace App\Listeners;

use App\Enum\SystemConfigKeyEnum;
use App\Events\CommentAdded;
use App\Models\SystemConfig;
use App\Notifications\Notifiables\CommentAddedNotifiable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class CommentAddedListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param CommentAdded $event
     * @return void
     */
    public function handle(CommentAdded $event)
    {
        $comment = $event->comment;
        // 发送钉钉消息
        if (config('ding.enabled')) {
            $message = "评论提醒：\n来自于{$comment->username}[{$comment->created_at}]：\n{$comment->content}\n";
            \Notification::send(new CommentAddedNotifiable($message), new \App\Notifications\CommentAdded());
        }
//        \Mail::to(['2393437757@qq.com'])->send(new \App\Mail\CommentAdded($comment));
        // 回复给主评论作者发送提醒邮件
        if ($comment->parent_id) {
            $parentComment = $comment->parent;
            $masterEmail = SystemConfig::where('name', SystemConfigKeyEnum::EMAIL)->value('value');
            if ($masterEmail && $parentComment->email !== $masterEmail) {
                \Mail::to([$parentComment->email])->send(new \App\Mail\CommentAdded($comment));
            }
        }
    }
}
