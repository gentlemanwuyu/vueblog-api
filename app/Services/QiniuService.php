<?php
/**
 * 七牛云服务类
 * User: Woozee
 * Date: 2020/11/22
 * Time: 9:16
 */

namespace App\Services;

use App\Libs\Exceptions\BusinessException;
use App\Models\QiniuFile;
use App\Responses\Admin\Qiniu\QiniuFileItem;
use App\Responses\Admin\Qiniu\QiniuPaginationResp;
use App\Responses\Admin\Qiniu\QiniuUploadResp;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;

class QiniuService extends BaseService
{
    protected string $bucket;

    public function __construct()
    {
        $this->bucket = config('qiniu.bucket');
    }

    /**
     * 七牛云资源列表列表
     *
     * @param Request $request
     * @return QiniuPaginationResp
     */
    public function getList(Request $request): QiniuPaginationResp
    {
        $paginator = QiniuFile::orderBy('id', 'desc')->paginate($request->get('page_size'));
        $resp = new QiniuPaginationResp($paginator);
        $resp->list = QiniuFileItem::fromList($paginator->items());

        return $resp;
    }

    /**
     * 上传文件
     *
     * @param UploadedFile $file
     * @param string $keyPrefix key的前缀
     * @return QiniuUploadResp
     * @throws BusinessException
     */
    public function upload(UploadedFile $file, string $keyPrefix = ''): QiniuUploadResp
    {
        if (!$file) {
            throw new BusinessException("请先上传文件");
        }
        $key = "{$keyPrefix}/" . uniqid() .".{$file->extension()}";
        $resp = \Qiniu::upload($file->path(), $this->bucket, $key);
        $qiniuFile = QiniuFile::create([
            'key' => $resp->key,
            'hash' => $resp->hash,
            'size' => $file->getSize(),
            'mime_type' => $file->getMimeType(),
        ]);

        return new QiniuUploadResp($qiniuFile);
    }

    /**
     * 删除文件
     *
     * @param int $id
     * @throws BusinessException
     * @throws \Exception
     */
    public function delete(int $id): void
    {
        $qiniuFile = QiniuFile::find($id);
        if (!$qiniuFile) {
            throw new BusinessException("找不到文件记录");
        }
        \Qiniu::delete($qiniuFile->key, $this->bucket);
        $qiniuFile->delete();
    }
}
