<?php
/**
 * 标签云Item
 * User: Woozee
 * Date: 2020/12/12
 * Time: 11:21
 */

namespace App\Responses\Front\Label;

use App\Responses\BaseResp;

class LabelCloudItem extends BaseResp
{
    /** @var int ID */
    public int $id;

    /** @var string 标签名 */
    public string $name;
}
