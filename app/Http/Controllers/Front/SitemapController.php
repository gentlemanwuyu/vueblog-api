<?php
/**
 * 网站地图控制器
 * User: Woozee
 * Date: 2020/12/26
 * Time: 15:55
 */

namespace App\Http\Controllers\Front;

use App\Services\SitemapService;

class SitemapController extends BaseFrontController
{
    protected SitemapService $sitemapService;

    public function __construct(SitemapService $sitemapService)
    {
        $this->sitemapService = $sitemapService;
    }

    public function index()
    {
        $pages = $this->sitemapService->getPages();

        return response()->view('sitemap.index', compact('pages'))->header('Content-Type', 'application/xml');
    }
}
