<?php
/**
 * Created by PhpStorm
 * User: Woozee
 * Date: 2020/10/27
 * Time: 17:24
 */

namespace App\Responses\Admin\User;

use App\Responses\BaseResp;

class DetailResp extends BaseResp
{
    /** @var int 用户ID */
    public int $id;

    /** @var string 用户名 */
    public string $name;

    /** @var string 邮箱 */
    public string $email;
}
