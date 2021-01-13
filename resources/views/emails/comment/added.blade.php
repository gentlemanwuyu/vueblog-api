<style>
    .mail-container {
        width: 100%;
        padding: 12px;
        font-size: 14px;
    }
    .mail-container a {
        text-decoration: none!important;
        color: #1976d2;
    }
    .mail-container a:hover {
        color: #fb8c00;
    }
    .mail-box {
        margin: auto;
        min-width: 600px;
        max-width: 800px;
        border-radius: 5px;
        box-shadow: 0px 3px 1px -2px rgba(0, 0, 0, 0.2), 0px 2px 2px 0px rgba(0, 0, 0, 0.14), 0px 1px 5px 0px rgba(0, 0, 0, 0.12);
    }
    .mail-box-title {
        height: 60px;
        line-height: 60px;
        background: #1976d2;
        color: #fff;
        padding-left: 12px;
        padding-right: 12px;
        box-sizing: border-box;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
        border-top-left-radius: 5px;
        border-top-right-radius: 5px;
    }
    .mail-box-title a {
        color: #fff;
    }
    .mail-box-body {
        padding: 12px;
    }
    .mail-box-body-title, .mail-box-body-origin, .mail-box-body-reply, .mail-box-body-reply-content, .mail-box-body-footer {
        padding-top: 12px;
        padding-bottom: 12px;
    }
    .mail-box-body-origin, .mail-box-body-reply-content {
        padding: 12px;
        margin-bottom: 12px;
        border-radius: 3px;
        box-shadow: 0px 3px 1px -2px rgba(0, 0, 0, 0.2), 0px 2px 2px 0px rgba(0, 0, 0, 0.14), 0px 1px 5px 0px rgba(0, 0, 0, 0.12);
    }
    .mail-box-body-footer {
        color: rgba(0, 0, 0, .5);
    }
</style>
<div class="mail-container">
    <div class="mail-box">
        <div class="mail-box-title">
            您在[<a href="{{$blog_url}}">吴宇博客</a>]的评论有了新的回复
        </div>
        <div class="mail-box-body">
            <div class="mail-box-body-title">
                {{$parent->username}}，您曾在文章《<a href="{{$article_summary['url']}}">{{$article_summary['shorten']}}</a>》上发表了评论:
            </div>
            <div class="mail-box-body-origin">
                {{$parent->content}}
            </div>
            <div class="mail-box-body-reply">
                {{$comment->username}} 给您的回复如下：
            </div>
            <div class="mail-box-body-reply-content">
                {{$comment->content}}
            </div>
            <div class="mail-box-body-footer">
                <p>请注意：此邮件由 <a href="{{$blog_url}}">吴宇博客</a> 自动发送，请勿直接回复。</p>
                <p>若此邮件不是您请求的，请忽略并删除！</p>
            </div>
        </div>
    </div>
</div>
