<?php
/**
 * 友情链接单条数据
 * User: Woozee
 * Date: 2020/10/30
 * Time: 13:39
 */

namespace App\Responses\Admin\Friendlink;

use App\Responses\BaseResp;

class FriendlinkItem extends BaseResp
{
    /** @var int ID */
    public int $id;

    /** @var string 友情链接名 */
    public string $name;

    /** @var string 链接 */
    public string $link;

    /** @var string 描述*/
    public string $desc;

    /** @var string 创建时间 */
    public string $created_at;

    /** @var string 更新时间 */
    public string $updated_at;
}
