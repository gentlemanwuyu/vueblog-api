<?php
/**
 * 菜单控制器
 * User: Woozee
 * Date: 2020/10/29
 * Time: 11:29
 */

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BaseController;
use App\Responses\Admin\Menu\MenuListResp;
use App\Services\MenuService;

class MenuController extends BaseController
{
    protected MenuService $menuService;

    public function __construct(MenuService $menuService)
    {
        $this->menuService = $menuService;
    }

    /**
     * @apidoc 菜单列表 | Admin
     * @return \Illuminate\Http\JsonResponse
     */
    public function list()
    {
        $list = $this->menuService->getList();
        $resp = new MenuListResp();
        $resp->list = $list;

        return \ApiResponse::success($resp);
    }
}
