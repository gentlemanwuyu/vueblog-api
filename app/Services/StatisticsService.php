<?php
/**
 * 统计服务类
 * User: Woozee
 * Date: 2020/12/27
 * Time: 13:33
 */

namespace App\Services;

use App\Models\Comment;
use App\Models\Visitor;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;

class StatisticsService extends BaseService
{
    /**
     * 今日PV
     *
     * @return int
     */
    public function getPv(): int
    {
        $today = Carbon::now()->toDateString();

        return Visitor::where('created_at', '>=', "{$today} 00:00:00")
            ->where('created_at', '<=', "{$today} 23:59:59")->count();
    }

    /**
     * 今日UV
     *
     * @return int
     */
    public function getUv(): int
    {
        $today = Carbon::now()->toDateString();

        return Visitor::where('created_at', '>=', "{$today} 00:00:00")
            ->where('created_at', '<=', "{$today} 23:59:59")
            ->groupBy('ip')->get('ip')->count();
    }

    /**
     * 今日新增评论
     * @return int
     */
    public function getNewComment(): int
    {
        $today = Carbon::now()->toDateString();

        return Comment::where('created_at', '>=', "{$today} 00:00:00")
            ->where('created_at', '<=', "{$today} 23:59:59")
            ->count();
    }

    /**
     * 待回复评论
     *
     * @return int
     */
    public function getPendingReplyComment(): int
    {
        return Comment::withCount([
            'children' => function (Builder $relation) {
                $relation->where('is_master', 1);
            }
        ])
            ->where('is_master', 0)
            ->get()
            ->filter(function (Comment $comment) {
                return $comment->children_count === 0;
            })->count();
    }
}
