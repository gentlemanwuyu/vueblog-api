<?php
/**
 * 列表响应基类
 * User: Woozee
 * Date: 2020/10/29
 * Time: 11:35
 */

namespace App\Responses;


abstract class BaseListResp extends BaseResp
{
    /** @var array 列表数据 */
    public array $list;
}
