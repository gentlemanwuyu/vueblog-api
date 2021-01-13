<?php
/**
 * 文件响应类
 * User: Woozee
 * Date: 2020/11/21
 * Time: 21:49
 */

namespace App\Libs\Vendor\Qiniu\Responses\Bucket;

use App\Libs\Vendor\Qiniu\Responses\BaseListResp;

class FileListResp extends BaseListResp
{
    /** @var FileItem[] 文件列表数据 */
    public array $items;

    /** @var string[] 返回目录名的数组，如没有指定delimiter参数则不输出。 */
    public ?array $commonPrefixes = null;
}
