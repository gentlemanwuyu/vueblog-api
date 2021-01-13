<?php
/**
 * 友情链接分页响应数据
 * User: Woozee
 * Date: 2020/10/30
 * Time: 13:27
 */

namespace App\Responses\Admin\Friendlink;

use App\Responses\BasePaginationResp;

class FriendlinkPaginationResp extends BasePaginationResp
{
    /** @var \App\Responses\Admin\Friendlink\FriendlinkItem[] 列表数据 */
    public array $list;
}
