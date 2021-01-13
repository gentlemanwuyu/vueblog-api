<?php
/**
 * 文章服务类
 * User: Woozee
 * Date: 2020/10/30
 * Time: 14:51
 */

namespace App\Services;

use App\Enum\OrderByEnum;
use App\Enum\Qiniu\KeyPrefixEnum;
use App\Helpers\Url;
use App\Http\Requests\Admin\ArticleRequest;
use App\Libs\Exceptions\BusinessException;
use App\Libs\Exceptions\FatalErrorException;
use App\Models\Article;
use App\Models\ArticleLabel;
use App\Responses\Admin\Article\ArticleDetailResp;
use App\Responses\Admin\Article\ArticleItem;
use App\Responses\Admin\Article\ArticlePaginationResp;
use App\Responses\Admin\Label\LabelItem;
use App\Responses\Admin\Qiniu\QiniuUploadResp;
use App\Responses\Front\Article\ArticleHotItem;
use App\Responses\Front\Article\ArticleNewItem;
use App\Responses\Front\Label\LabelCloudItem;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;

class ArticleService extends BaseService
{
    protected CategoryService $categoryService;
    protected QiniuService $qiniuService;

    public function __construct(CategoryService $categoryService, QiniuService $qiniuService)
    {
        $this->categoryService = $categoryService;
        $this->qiniuService = $qiniuService;
    }

    /**
     * 文章列表
     *
     * @param Request $request
     * @return ArticlePaginationResp
     */
    public function getList(Request $request): ArticlePaginationResp
    {
        $paginator = Article::with([
            'keywords',
            'labels',
            'category' => function (Relation $relation) {
                $relation->with('parent');
            },
        ])->orderBy('id', 'desc')
            ->paginate($request->get('page_size'));
        $resp = new ArticlePaginationResp($paginator);
        $list = [];
        foreach ($paginator->items() as $article) {
            /** @var Article $article */
            $item = ArticleItem::fromItem($article);
            $item->keyword_list = array_column($article->keywords->toArray(), 'keyword');
            $item->label_list = LabelItem::fromList($article->labels->toArray());
            $list[] = $item;
        }
        $resp->list = $list;
        return $resp;
    }

    /**
     * 保存文章
     *
     * @param ArticleRequest $request
     * @throws FatalErrorException
     * @throws \Throwable
     */
    public function save(ArticleRequest $request): void
    {
        try {
            if ($id = $request->get('id')) {
                $article = Article::find($id);
            }else {
                $article = new Article();
            }
            \DB::beginTransaction();
            $article->title = $request->get('title');
            $article->content = $request->get('content');
            $article->summary = $request->get('summary');
            $article->summary_image_id = $request->get('summary_image_id', 0);
            $article->category_id = $request->get('category_id');
            $article->save();
            // 同步标签
            $article->syncLabel($request->get('label_list', []));
            // 同步关键词
            $article->syncKeyword($request->get('keyword_list'));
            \DB::commit();
        } catch (\Throwable $e) {
            \DB::rollBack();
            throw new FatalErrorException($e->getMessage());
        }
    }

    /**
     * 删除文章
     *
     * @param int $id
     * @throws \Exception
     * @throws \Throwable
     */
    public function delete(int $id): void
    {
        try {
            $article = Article::find($id);
            if (!$article) {
                throw new BusinessException("文章不存在");
            }
            \DB::beginTransaction();
            $article->syncKeyword([]);
            $article->syncLabel([]);
            $article->delete();
            \DB::commit();
        } catch (\Throwable $e) {
            \DB::rollBack();
            throw new FatalErrorException($e->getMessage());
        }
    }

    /**
     * 文章详情
     *
     * @param int $id 文章ID
     * @return ArticleDetailResp
     * @throws BusinessException
     */
    public function getDetail(int $id): ArticleDetailResp
    {
        $article = Article::with([
            'labels',
            'keywords',
            'category' => function (Relation $relation) {
                $relation->with('parent');
            },
        ])->find($id);
        if (!$article) {
            throw new BusinessException('文章找不到');
        }
        $resp = new ArticleDetailResp($article->toArray());
        $resp->keyword_list = array_column($article->keywords->toArray(), 'keyword');
        $resp->label_list = LabelItem::fromList($article->labels->toArray());

        return $resp;
    }

    /**
     * 前端文章详情
     *
     * @param int $id
     * @return \App\Responses\Front\Article\ArticleDetailResp
     * @throws BusinessException
     */
    public function getFrontDetail(int $id): \App\Responses\Front\Article\ArticleDetailResp
    {
        $article = Article::with([
            'labels',
            'category',
            'data',
        ])->withCount('comments')->find($id);
        if (!$article) {
            throw new BusinessException('文章找不到');
        }
        $resp = new \App\Responses\Front\Article\ArticleDetailResp($article->toArray());
        $resp->category_name = $article->category->name ?? null;
        $resp->views = $article->data->views ?? 0;
        $resp->keyword_list = array_column($article->keywords->toArray(), 'keyword');
        $resp->label_list = LabelCloudItem::fromList($article->labels->toArray());
        // 查询上一篇和下一篇
        $previous = Article::where('id', '<', $article->id)->orderBy('id', OrderByEnum::DESC)->first();
        $next = Article::where('id', '>', $article->id)->first();
        $previous && $resp->previous = new ArticleHotItem($previous);
        $next && $resp->next = new ArticleHotItem($next);

        return $resp;
    }

    /**
     * 获取热门文章
     *
     * @param int $limit
     * @return ArticleHotItem[]
     */
    public function getHot(int $limit = 10): array
    {
        $articleList = Article::leftJoin('article_data as ad', 'articles.id', '=', 'ad.article_id')
            ->orderBy('views', OrderByEnum::DESC)
            ->limit($limit)
            ->get([
                'articles.id',
                'articles.title',
                'ad.views'
            ]);

        return ArticleHotItem::fromList($articleList->toArray());
    }

    /**
     * 获取最新文章
     *
     * @param int $limit
     * @return ArticleNewItem[]
     */
    public function getNew(int $limit = 10): array
    {
        $articleList = Article::with(['data', 'category' => function ($relation) {
            $relation->with(['image']);
        }])
            ->withCount(['comments as comment_number'])
            ->orderBy('id', OrderByEnum::DESC)
            ->limit($limit)
            ->get();
        $list = [];
        foreach ($articleList as $article) {
            /** @var Article $item */
            $item = new ArticleNewItem($article);
            $item->category_name = $article->category->name;
            $item->created_at = Carbon::parse($item->created_at)->toDateString();
            if (!empty($article->category->image)) {
                $item->image_url = Url::getQiniuUrl($article->category->image->key);
            }
            if (!empty($article->data)) {
                $item->views = $article->data->views;
            }
            $list[] = $item;
        }

        return $list;
    }

    /**
     * 前端文章列表
     *
     * @param Request $request
     * @return \App\Responses\Front\Article\ArticlePaginationResp
     */
    public function getFrontList(Request $request): \App\Responses\Front\Article\ArticlePaginationResp
    {
        $query = Article::with(['data', 'category' => function ($relation) {
            $relation->with(['image']);
        }])->withCount(['comments as comment_number']);
        // 分类页文章
        $categoryId = $request->get('category_id');
        if (!empty($categoryId)) {
            $categoryIdList = $this->categoryService->getChildrenIdList($categoryId);
            $categoryIdList = array_merge([$categoryId], $categoryIdList);
            $query->whereIn('category_id', $categoryIdList);
        }
        // 标签页文章
        $labelId = $request->get('label_id');
        if (!empty($labelId)) {
            $articleIdList = ArticleLabel::where('label_id', $labelId)->pluck('article_id')->toArray();
            $articleIdList = array_unique($articleIdList);
            $query->whereIn('id', $articleIdList);
        }
        $paginator = $query->orderBy('id', OrderByEnum::DESC)->paginate($request->get('page_size', 10));
        $resp = new \App\Responses\Front\Article\ArticlePaginationResp($paginator);
        $list = [];
        foreach ($paginator->items() as $article) {
            /** @var Article $item */
            $item = new ArticleNewItem($article);
            $item->category_name = $article->category->name;
            $item->created_at = Carbon::parse($item->created_at)->toDateString();
            if (!empty($article->category->image)) {
                $item->image_url = Url::getQiniuUrl($article->category->image->key);
            }
            if (!empty($article->data)) {
                $item->views = $article->data->views;
            }
            $list[] = $item;
        }
        $resp->list = $list;

        return $resp;
    }

    /**
     * 上传文件
     *
     * @param UploadedFile $file
     * @return QiniuUploadResp
     * @throws BusinessException
     */
    public function upload(UploadedFile $file): QiniuUploadResp
    {
        return $this->qiniuService->upload($file, KeyPrefixEnum::ARTICLE);
    }
}
