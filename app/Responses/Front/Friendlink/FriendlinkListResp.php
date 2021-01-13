<?php
/**
 * 友情链接前端响应类
 * User: Woozee
 * Date: 2020/12/12
 * Time: 22:27
 */

namespace App\Responses\Front\Friendlink;


class FriendlinkListResp extends \App\Responses\BaseListResp
{
    /** @var \App\Responses\Front\Friendlink\FriendlinkItem[] 列表数据 */
    public array $list;
}
