<?php
/**
 * 所有标签Item
 * User: Woozee
 * Date: 2020/11/23
 * Time: 20:47
 */

namespace App\Responses\Admin\Label;

use App\Responses\BaseResp;

class LabelAllItem extends BaseResp
{
    /** @var int ID */
    public int $id;

    /** @var string 标签名 */
    public string $name;
}
