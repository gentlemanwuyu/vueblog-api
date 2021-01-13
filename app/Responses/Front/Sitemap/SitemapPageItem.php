<?php
/**
 * 网站地图页面Item
 * User: Woozee
 * Date: 2020/12/26
 * Time: 16:04
 */

namespace App\Responses\Front\Sitemap;

use App\Responses\BaseResp;

class SitemapPageItem extends BaseResp
{
    /** @var string 路径 */
    public string $loc;

    /** @var string 最后更新时间 */
    public string $lastmod;

    public function __construct(string $loc, string $lastmod)
    {
        $this->loc = $loc;
        $this->lastmod = $lastmod;
    }
}
