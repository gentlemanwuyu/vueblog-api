<?php
/**
 * 热门文章相应类
 * User: Woozee
 * Date: 2020/12/12
 * Time: 12:06
 */

namespace App\Responses\Front\Article;


class ArticleHotResp extends \App\Responses\BaseListResp
{
    /** @var \App\Responses\Front\Article\ArticleHotItem[] 列表数据 */
    public array $list;
}
