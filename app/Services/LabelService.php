<?php
/**
 * 标签服务类
 * User: Woozee
 * Date: 2020/10/29
 * Time: 18:59
 */

namespace App\Services;

use App\Http\Requests\Admin\LabelRequest;
use App\Libs\Exceptions\BusinessException;
use App\Models\ArticleLabel;
use App\Models\Label;
use App\Responses\Admin\Label\LabelAllItem;
use App\Responses\Admin\Label\LabelItem;
use App\Responses\Admin\Label\LabelPaginationResp;
use App\Responses\Front\Label\LabelCloudItem;
use Illuminate\Database\Query\Builder;
use Illuminate\Http\Request;

class LabelService extends BaseService
{
    /**
     * 标签列表
     *
     * @param Request $request
     * @return LabelPaginationResp
     */
    public function getList(Request $request): LabelPaginationResp
    {
        $paginator = Label::orderBy('id', 'desc')->paginate($request->get('page_size'));
        $resp = new LabelPaginationResp($paginator);
        $resp->list = LabelItem::fromList($paginator->items());

        return $resp;
    }

    /**
     * 保存标签
     *
     * @param LabelRequest $request
     */
    public function save(LabelRequest $request): void
    {
        if ($id = $request->get('id')) {
            $label = Label::find($id);
        }else {
            $label = new Label();
        }
        $label->name = $request->get('name');
        $label->save();
    }

    /**
     * 删除标签
     *
     * @param int $id
     * @throws BusinessException
     * @throws \Exception
     */
    public function delete(int $id): void
    {
        $label = Label::find($id);
        if (!$label) {
            throw new BusinessException("标签不存在");
        }
        if (ArticleLabel::where('label_id', $id)->exists()) {
            throw new BusinessException("该标签存在关联文章，不可删除");
        }
        $label->delete();
    }

    /**
     * 获取所有标签
     *
     * @return LabelAllItem[]
     */
    public function getAll(): array
    {
        $labelList = Label::get(['id', 'name'])->toArray();

        return LabelAllItem::fromList($labelList);
    }

    /**
     * 标签云
     *
     * @param int $limit
     * @return LabelCloudItem[]
     */
    public function getCloud(int $limit = 30): array
    {
        $labelList = Label::whereIn('id', function (Builder $query) {
            $query->from((new ArticleLabel)->getTable())
                ->select(\DB::raw('distinct label_id'));
        })
            ->limit($limit)
            ->get(['id', 'name']);

        return LabelCloudItem::fromList($labelList->toArray());
    }
}
