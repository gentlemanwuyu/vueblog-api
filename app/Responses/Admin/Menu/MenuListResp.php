<?php
/**
 * Created by PhpStorm
 * User: Woozee
 * Date: 2020/10/29
 * Time: 11:34
 */

namespace App\Responses\Admin\Menu;

use App\Responses\BaseListResp;

class MenuListResp extends BaseListResp
{
    /** @var \App\Responses\Admin\Menu\MenuItem[] 用户ID */
    public array $list;
}
