<?php
/**
 * 文件请求类
 * User: Woozee
 * Date: 2020/11/21
 * Time: 21:41
 */

namespace App\Libs\Vendor\Qiniu\Requests\Bucket;

use App\Libs\Vendor\Qiniu\Requests\BaseRequest;

class FileListRequest extends BaseRequest
{
    /** @var string 指定空间 */
    public string $bucket;

    /** @var string 上一次列举返回的位置标记，作为本次列举的起点信息。默认值为空字符串。 */
    public string $marker = '';

    /** @var int 上一次列举返回的位置标记，作为本次列举的起点信息。默认值为空字符串。 */
    public int $limit = 100;

    /** @var string 指定前缀，只有资源名匹配该前缀的资源会被列出。默认值为空字符串。 */
    public string $prefix = '';

    /** @var string 指定目录分隔符，列出所有公共前缀（模拟列出目录效果）。默认值为空字符串。 */
    public string $delimiter = '';
}
