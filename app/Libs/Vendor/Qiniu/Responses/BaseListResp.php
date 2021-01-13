<?php
/**
 * 七牛云基础列表响应类
 * User: Woozee
 * Date: 2020/11/21
 * Time: 21:37
 */

namespace App\Libs\Vendor\Qiniu\Responses;

use App\Libs\Base\BaseFillable;

abstract class BaseListResp extends BaseFillable
{
    /** @var array 列表数据 */
    public array $items;

    /** @var string 上一次列举返回的位置标记，作为本次列举的起点信息。默认值为空字符串。 */
    public ?string $marker = null;
}
