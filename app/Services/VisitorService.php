<?php
/**
 * 访客服务类
 * User: Woozee
 * Date: 2020/12/20
 * Time: 21:57
 */

namespace App\Services;

use App\Libs\Exceptions\FatalErrorException;
use App\Models\ArticleData;
use Illuminate\Http\Request;
use App\Models\Visitor;

class VisitorService extends BaseService
{
    /**
     * 上报访客数据
     *
     * @param Request $request
     * @throws FatalErrorException
     * @throws \Throwable
     */
    public function track(Request $request): void
    {
        try {
            $data = [
                'ip' => $request->header('x-real-ip'),
                'url' => $request->get('url'),
                'referer' => $request->get('referer'),
                'device' => $request->get('device'),
                'route_name' => $request->get('route_name'),
                'query_string' => $request->get('query_string', '423432'),
                'article_id' => $request->get('article_id', 0),
                'category_id' => $request->get('category_id', 0),
            ];

            \DB::beginTransaction();
            $visitor = Visitor::create($data);
            if ($data['article_id']) {
                $articleData = ArticleData::where('article_id', $visitor->article_id)->first();
                if (!$articleData) {
                    ArticleData::create([
                        'article_id' => $visitor->article_id,
                        'views' => 1,
                    ]);
                }else {
                    $articleData->views++;
                    $articleData->save();
                }
            }
            \DB::commit();
        } catch (\Throwable $e) {
            \DB::rollBack();
            throw new FatalErrorException($e->getMessage());
        }
    }
}
