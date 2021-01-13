<?php
/**
 * 标签分页响应数据
 * User: Woozee
 * Date: 2020/10/29
 * Time: 20:18
 */

namespace App\Responses\Admin\Label;

use App\Responses\BasePaginationResp;

class LabelPaginationResp extends BasePaginationResp
{
    /** @var \App\Responses\Admin\Label\LabelItem[] 列表数据 */
    public array $list;
}
