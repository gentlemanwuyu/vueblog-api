<?php
/**
 * 菜单服务类
 * User: Woozee
 * Date: 2020/10/29
 * Time: 11:20
 */

namespace App\Services;

use App\Responses\Admin\Menu\MenuItem;

class MenuService extends BaseService
{
    /**
     * 获取菜单列表
     *
     * @return MenuItem[]
     */
    public function getList(): array
    {
        $menuConfig = config('menus');

        return MenuItem::fromList($menuConfig);
    }
}
