<?php
/**
 * 七牛云控制器
 * User: Woozee
 * Date: 2020/11/22
 * Time: 9:14
 */

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BaseController;
use App\Services\QiniuService;
use Illuminate\Http\Request;

class QiniuController extends BaseController
{
    protected QiniuService $qiniuService;

    public function __construct(QiniuService $qiniuService)
    {
        $this->qiniuService = $qiniuService;
    }

    /**
     * @apidoc 七牛云资源列表 | Admin
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function list(Request $request)
    {
        $resp = $this->qiniuService->getList($request);

        return \ApiResponse::success($resp);
    }

    /**
     * @apidoc 上传文件 | Admin
     * @return \Illuminate\Http\JsonResponse
     * @throws \App\Libs\Exceptions\BusinessException
     */
    public function upload()
    {
//        $resp = json_decode(json_encode(['id' => 22, 'name' => 'anzhuo.jpg', 'size' => 657843, 'mime_type' => 'jpg']));
        $resp = $this->qiniuService->upload(request()->file('file'));

        return \ApiResponse::success($resp);
    }

    /**
     * @apidoc 删除文件 | Admin
     * @return \Illuminate\Http\JsonResponse
     * @throws \App\Libs\Exceptions\BusinessException
     */
    public function delete()
    {
        $this->qiniuService->delete(request('id'));

        return \ApiResponse::success();
    }
}
