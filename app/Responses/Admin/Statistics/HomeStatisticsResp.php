<?php
/**
 * 首页统计响应类
 * User: Woozee
 * Date: 2020/12/27
 * Time: 13:37
 */

namespace App\Responses\Admin\Statistics;

use App\Responses\BaseResp;

class HomeStatisticsResp extends BaseResp
{
    /** @var int PV */
    public int $pv;

    /** @var int UV */
    public int $uv;

    /** @var int 新增评论 */
    public int $new_comment;

    /** @var int 待回复评论 */
    public int $pending_reply_comment;
}
