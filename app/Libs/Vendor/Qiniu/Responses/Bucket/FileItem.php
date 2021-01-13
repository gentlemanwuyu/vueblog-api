<?php
/**
 * 文件Item类
 * User: Woozee
 * Date: 2020/11/21
 * Time: 21:34
 */

namespace App\Libs\Vendor\Qiniu\Responses\Bucket;

use App\Libs\Vendor\Qiniu\Responses\BaseResp;

class FileItem extends BaseResp
{
    /** @var string 资源名 */
    public string $key;

    /** @var string 文件的HASH值，使用hash值算法计算。 */
    public string $hash;

    /** @var int 资源内容的大小，单位：字节。 */
    public int $fsize;

    /** @var string 资源的 MIME 类型。 */
    public string $mimeType;

    /** @var int 上传时间，单位：100纳秒，其值去掉低七位即为Unix时间戳。 */
    public int $putTime;

    /**
     * @var string 文件md5值
     * 32位16进制组成的字符串，只有通过直传文件和追加文件API上传的文件，服务端确保有该字段返回。
     * 如请求时服务端没有返回md5字段，可以通过请求qhash/md5 方法来获取
     * 比如 http://test.com/test.mp4?qhash/md5
     */
    public string $md5;

    /** @var int 资源的存储类型，2 表示归档存储，1 表示低频存储，0表示标准存储。 */
    public int $type;

    /** @var int 文件的存储状态，即禁用状态和启用状态间的的互相转换，0表示启用，1表示禁用 */
    public int $status;

    /** @var string 资源内容的唯一属主标识 */
    public ?string $endUser = null;
}
