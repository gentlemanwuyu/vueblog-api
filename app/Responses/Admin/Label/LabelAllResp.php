<?php
/**
 * 所有标签响应数据
 * User: Woozee
 * Date: 2020/11/23
 * Time: 20:49
 */

namespace App\Responses\Admin\Label;

use App\Responses\BasePaginationResp;

class LabelAllResp extends BasePaginationResp
{
    /** @var \App\Responses\Admin\Label\LabelAllItem[] 列表数据 */
    public array $list;
}
