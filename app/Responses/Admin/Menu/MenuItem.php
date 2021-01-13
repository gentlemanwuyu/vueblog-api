<?php
/**
 * 菜单项
 * User: Woozee
 * Date: 2020/10/29
 * Time: 11:37
 */

namespace App\Responses\Admin\Menu;

use App\Responses\BaseResp;

class MenuItem extends BaseResp
{
    /** @var int ID */
    public int $id;

    /** @var string 标题 */
    public string $title;

    /** @var string 标题 */
    public string $icon;

    /** @var string 路由 */
    public ?string $route;

    /** @var \App\Responses\Admin\Menu\MenuItem[] 路由 */
    public ?array $children;
}
