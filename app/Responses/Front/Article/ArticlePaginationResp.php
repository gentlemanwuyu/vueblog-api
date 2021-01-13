<?php
/**
 * 前端文章分页响应类
 * User: Woozee
 * Date: 2020/12/20
 * Time: 0:14
 */

namespace App\Responses\Front\Article;

use App\Responses\BasePaginationResp;

class ArticlePaginationResp extends BasePaginationResp
{
    /** @var \App\Responses\Front\Article\ArticleNewItem[] 列表数据 */
    public array $list;
}
