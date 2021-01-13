<?php
/**
 * 七牛云资源列表相应类
 * User: Woozee
 * Date: 2020/11/22
 * Time: 9:20
 */

namespace App\Responses\Admin\Qiniu;

use App\Responses\BasePaginationResp;

class QiniuPaginationResp extends BasePaginationResp
{
    /** @var \App\Responses\Admin\Qiniu\QiniuFileItem[] 列表数据 */
    public array $list;
}
