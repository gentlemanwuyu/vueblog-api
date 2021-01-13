<?php
/**
 * Created by PhpStorm
 * User: Woozee
 * Date: 2020/11/22
 * Time: 21:26
 */

namespace App\Libs\Vendor\Qiniu\Responses\Upload;

use App\Libs\Vendor\Qiniu\Responses\BaseResp;

class UploadResp extends BaseResp
{
    /** @var string 实际资源名。 */
    public string $key;

    /** @var string 资源内容的 SHA1 值。 */
    public string $hash;
}
