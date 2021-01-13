<?php

namespace App\Mail;

use App\Enum\Comment\SourceEnum;
use App\Libs\Helpers\Str;
use App\Models\Comment;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class CommentAdded extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    protected Comment $comment;

    /**
     * Create a new message instance.
     *
     * @param Comment $comment
     */
    public function __construct(Comment $comment)
    {
        $this->comment = $comment;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $parent = $this->comment->parent;
        $articleSummary = [];
        if ($parent->source === SourceEnum::ABOUT) {
            $articleSummary['shorten'] = '关于';
            $articleSummary['url'] = trim(config('app.url'), '/') . '/about.html';
        } else {
            $article = $this->comment->article;
            $articleSummary['shorten'] = Str::shorten($article->title);
            $articleSummary['url'] = trim(config('app.url'), '/') . "/article/{$article->id}.html";
        }
        $subject = "[评论回复通知]Re:" . Str::shorten($parent->content);
        return $this->subject($subject)
            ->view('emails.comment.added', [
                'comment' => $this->comment,
                'parent' => $parent,
                'blog_url' => config('app.url'),
                'article_summary' => $articleSummary,
            ]);
    }
}
