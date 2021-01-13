<?php
/**
 * 友情链接Item
 * User: Woozee
 * Date: 2020/12/12
 * Time: 22:25
 */

namespace App\Responses\Front\Friendlink;


class FriendlinkItem extends \App\Responses\BaseResp
{
    /** @var int ID */
    public int $id;

    /** @var string 友情链接名 */
    public string $name;

    /** @var string 链接 */
    public string $link;

    /** @var string 描述*/
    public string $desc;
}
