<?php
/**
 * 友情链接服务类
 * User: Woozee
 * Date: 2020/10/30
 * Time: 9:29
 */

namespace App\Services;

use App\Http\Requests\Admin\FriendlinkRequest;
use App\Libs\Exceptions\BusinessException;
use App\Models\Friendlink;
use App\Responses\Admin\Friendlink\FriendlinkItem;
use App\Responses\Admin\Friendlink\FriendlinkPaginationResp;
use Illuminate\Http\Request;

class FriendlinkService extends BaseService
{
    /**
     * 友情链接列表
     *
     * @param Request $request
     * @return FriendlinkPaginationResp
     */
    public function getList(Request $request): FriendlinkPaginationResp
    {
        $paginator = Friendlink::orderBy('id', 'desc')->paginate($request->get('page_size'));
        $resp = new FriendlinkPaginationResp($paginator);
        $resp->list = FriendlinkItem::fromList($paginator->items());

        return $resp;
    }

    /**
     * 保存友情链接
     *
     * @param FriendlinkRequest $request
     */
    public function save(FriendlinkRequest $request): void
    {
        if ($id = $request->get('id')) {
            $friendlink = Friendlink::find($id);
        }else {
            $friendlink = new Friendlink();
        }
        $friendlink->name = $request->get('name');
        $friendlink->link = $request->get('link');
        $friendlink->desc = $request->get('desc');
        $friendlink->save();
    }

    /**
     * 删除友情链接
     *
     * @param int $id
     * @throws BusinessException
     * @throws \Exception
     */
    public function delete(int $id): void
    {
        $friendlink = Friendlink::find($id);
        if (!$friendlink) {
            throw new BusinessException("友情链接不存在");
        }
        $friendlink->delete();
    }

    /**
     * 获取所有友情链接
     *
     * @return \App\Responses\Front\Friendlink\FriendlinkItem[]
     */
    public function getAll(): array
    {
        $friendList = Friendlink::all();

        return \App\Responses\Front\Friendlink\FriendlinkItem::fromList($friendList->toArray());
    }
}
