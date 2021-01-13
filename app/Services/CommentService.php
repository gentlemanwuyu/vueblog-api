<?php
/**
 * 评论服务类
 * User: Woozee
 * Date: 2020/12/7
 * Time: 16:22
 */

namespace App\Services;

use App\Enum\BoolIntEnum;
use App\Enum\Comment\SourceEnum;
use App\Enum\SystemConfigKeyEnum;
use App\Http\Requests\Front\CommentRequest;
use App\Libs\Exceptions\BusinessException;
use App\Libs\Exceptions\FatalErrorException;
use App\Libs\Helpers\Arr;
use App\Models\Comment;
use App\Models\SystemConfig;
use App\Responses\Admin\Comment\CommentItem;
use App\Responses\Admin\Comment\CommentPaginationResp;
use App\Responses\Front\Comment\CommentTreeItem;
use App\Responses\Front\Comment\CommentTreeResp;
use Creativeorange\Gravatar\Facades\Gravatar;
use Illuminate\Http\Request;

class CommentService extends BaseService
{
    /**
     * 添加评论
     *
     * @param CommentRequest $request
     * @throws FatalErrorException
     */
    public function add(CommentRequest $request): void
    {
        $data = [
            'content' => $request->get('content'),
            'username' => $request->get('username'),
            'email' => $request->get('email'),
            'link' => $request->get('link'),
            'source' => $request->get('source'),
            'parent_id' => $request->get('parent_id', 0),
        ];
        if (!in_array($data['source'], SourceEnum::getKeys())) {
            throw new FatalErrorException("评论来源[{$data['source']}]不合法");
        }
        if (SourceEnum::ARTICLE === (int)$data['source']) {
            $data['article_id'] = $request->get('article_id', 0);
        }
        $masterEmail = SystemConfig::where('name', SystemConfigKeyEnum::EMAIL)->value('value');
        if ($data['email'] == $masterEmail) {
            $data['is_master'] = BoolIntEnum::TRUE;
        }
        $comment = Comment::create($data);
        event(new \App\Events\CommentAdded($comment));
    }

    /**
     * 评论树
     *
     * @param Request $request
     * @return CommentTreeResp
     */
    public function getTree(Request $request): CommentTreeResp
    {
        // 数据量不大，直接查出所有数据再在内存中组装父子关系
        $query = Comment::with(['parent']);
        if (!empty($request->get('source'))) {
            $query->where('source', $request->get('source'));
        }
        if (!empty($request->get('article_id'))) {
            $query->where('article_id', $request->get('article_id'));
        }
        $commentList = $query->orderBy('id', 'desc')->get();
        foreach ($commentList as $comment) {
            $comment->avatar= Gravatar::get($comment['email']);
        }
        $commentList = $commentList->toArray();
        $commentTree = Arr::toTree($commentList, 'id', 'parent_id', 0,  'children', 999);
        $page = $request->get('page', 1);
        $pageSize = $request->get('page_size', 10);
        $pageTree = array_slice($commentTree,  ($page- 1) * $pageSize, $pageSize);
        $resp = new CommentTreeResp();
        $resp->list = CommentTreeItem::fromList($pageTree);
        $resp->comment_total = count($commentList);
        $resp->total = count($commentTree);
        $resp->page_size = $pageSize;
        $resp->page = $page;
        return $resp;
    }

    /**
     * 评论列表
     *
     * @param Request $request
     * @return CommentPaginationResp
     */
    public function getList(Request $request): CommentPaginationResp
    {
        $paginator = Comment::with(['parent', 'article'])
            ->withCount('children')
            ->orderBy('id', 'desc')
            ->paginate($request->get('page_size'));
        $list = [];
        foreach ($paginator->items() as $comment) {
            $item = CommentItem::fromItem($comment);
            if ($comment->parent) {
                $item->parent_content = $comment->parent->content;
            }
            $list[] = $item;
        }
        $resp = new CommentPaginationResp($paginator);
        $resp->list = $list;

        return $resp;
    }

    /**
     * 删除评论
     *
     * @param int $id
     * @throws BusinessException
     * @throws \Exception
     */
    public function delete(int $id): void
    {
        $comment = Comment::withCount('children')->find($id);
        if (!$comment) {
            throw new BusinessException("评论不存在");
        }
        if (0 < $comment->children_count) {
            throw new BusinessException("有子评论的不可删除");
        }
        $comment->delete();
    }
}
