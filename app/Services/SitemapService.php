<?php
/**
 * 网站地图服务类
 * User: Woozee
 * Date: 2020/12/26
 * Time: 15:57
 */

namespace App\Services;

use App\Enum\OrderByEnum;
use App\Models\Article;
use App\Models\Category;
use App\Models\Label;
use App\Responses\Front\Sitemap\SitemapPageItem;
use Carbon\Carbon;

class SitemapService extends BaseService
{
    /**
     * 获取所有页面
     *
     * @return SitemapPageItem[]
     */
    public function getPages(): array
    {
        $frontUrl = trim(config('global.front_url'), '/');
        $now = Carbon::now()->toDateString();
        $pages = [];

        // 关于页面
        $pages[] = new SitemapPageItem("{$frontUrl}/about.html", $now);
        // IT导航页
        $pages[] = new SitemapPageItem("{$frontUrl}/it.html", $now);
        // 分类页
        $categories = Category::orderBy('id', OrderByEnum::DESC)->get(['id']);
        foreach ($categories as $category) {
            $pages[] = new SitemapPageItem("{$frontUrl}/category/{$category->id}.html", $now);
        }
        // 标签页
        $labels = Label::orderBy('id', OrderByEnum::DESC)->get(['id']);
        foreach ($labels as $label) {
            $pages[] = new SitemapPageItem("{$frontUrl}/label/{$label->id}.html", $now);
        }
        // 文章详情页
        $articles = Article::orderBy('id', OrderByEnum::DESC)->get(['id']);
        foreach ($articles as $article) {
            $pages[] = new SitemapPageItem("{$frontUrl}/article/{$article->id}.html", $now);
        }

        return $pages;
    }
}
