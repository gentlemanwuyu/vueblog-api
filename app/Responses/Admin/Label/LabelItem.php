<?php
/**
 * 标签列表Item
 * User: Woozee
 * Date: 2020/10/29
 * Time: 20:28
 */

namespace App\Responses\Admin\Label;

use App\Responses\BaseResp;

class LabelItem extends BaseResp
{
    /** @var int ID */
    public int $id;

    /** @var string 标签名 */
    public string $name;

    /** @var string 创建时间 */
    public string $created_at;

    /** @var string 更新时间 */
    public string $updated_at;
}
