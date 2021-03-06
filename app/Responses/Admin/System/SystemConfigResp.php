<?php
/**
 * 系统配置响应类
 * User: Woozee
 * Date: 2020/12/13
 * Time: 1:02
 */

namespace App\Responses\Admin\System;

use App\Responses\BaseResp;

class SystemConfigResp extends BaseResp
{
    /** @var string 博客名 */
    public string $name;

    /** @var string 博客地址 */
    public string $address;

    /** @var string 博主邮箱 */
    public string $email;

    /** @var string 博客标题 */
    public string $title;

    /** @var string[] 关键词列表 */
    public array $keyword_list;

    /** @var string 描述 */
    public string $desc;

    /** @var string 关于 */
    public string $about;

    /** @var string ICP备案号 */
    public string $icp;
}
