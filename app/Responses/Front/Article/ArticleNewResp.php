<?php
/**
 * Created by PhpStorm
 * User: Woozee
 * Date: 2020/12/12
 * Time: 16:36
 */

namespace App\Responses\Front\Article;


class ArticleNewResp extends \App\Responses\BaseListResp
{
    /** @var \App\Responses\Front\Article\ArticleNewItem[] 列表数据 */
    public array $list;
}
