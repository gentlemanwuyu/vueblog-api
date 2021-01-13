<?php
/**
 * 分类图片响应类
 * User: Woozee
 * Date: 2020/12/9
 * Time: 21:26
 */

namespace App\Responses\Admin\Category;

use App\Helpers\Url;
use App\Responses\BaseResp;

class CategoryImage extends BaseResp
{
    /** @var int ID */
    public int $id;

    /** @var string 图片键值 */
    public string $key;

    /** @var int 图片尺寸 */
    public int $size;

    /** @var string 图片类型 */
    public string $mime_type;

    /** @var string 预览路径 */
    public ?string $preview_url = null;

    protected function afterFill(): void
    {
        $this->preview_url = Url::getQiniuUrl($this->key);
    }
}
