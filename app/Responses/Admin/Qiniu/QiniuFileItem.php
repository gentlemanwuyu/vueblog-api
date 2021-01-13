<?php
/**
 * 七牛云文件Item
 * User: Woozee
 * Date: 2020/11/22
 * Time: 9:20
 */

namespace App\Responses\Admin\Qiniu;

use App\Helpers\Url;
use App\Responses\BaseResp;

class QiniuFileItem extends BaseResp
{
    /** @var int ID */
    public int $id;

    /** @var string 资源名 */
    public string $key;

    /** @var string 预览路径 */
    public string $preview_url;

    /** @var int 文件大小(KB) */
    public int $size;

    /** @var string 文件类型 */
    public string $mime_type;

    /** @var string 创建时间 */
    public string $created_at;

    /** @var string 更新时间 */
    public string $updated_at;

    protected function afterFill(): void
    {
        $this->size = ceil($this->size / 1000);
        $this->preview_url = Url::getQiniuUrl($this->key);
    }
}
