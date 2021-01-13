<?php
/**
 * 文章列表响应类
 * User: Woozee
 * Date: 2020/11/29
 * Time: 21:00
 */

namespace App\Responses\Admin\Article;

use App\Responses\BasePaginationResp;

class ArticlePaginationResp extends BasePaginationResp
{
    /** @var \App\Responses\Admin\Article\ArticleItem[] 列表数据 */
    public array $list;
}
