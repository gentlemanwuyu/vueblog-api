<?php
/**
 * 标签云相应类
 * User: Woozee
 * Date: 2020/12/12
 * Time: 11:24
 */

namespace App\Responses\Front\Label;


class LabelCloudResp extends \App\Responses\BaseListResp
{
    /** @var \App\Responses\Front\Label\LabelCloudItem[] 列表数据 */
    public array $list;
}
