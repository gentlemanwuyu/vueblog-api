<?php
/**
 * 七牛云类
 * User: Woozee
 * Date: 2020/11/21
 * Time: 13:23
 */

namespace App\Libs\Vendor\Qiniu;

use App\Libs\Vendor\Qiniu\Enums\HttpCodeEnum;
use App\Libs\Vendor\Qiniu\Exceptions\ApiResponseDataException;
use App\Libs\Vendor\Qiniu\Exceptions\ApiResponseErrorException;
use App\Libs\Vendor\Qiniu\Requests\Bucket\FileListRequest;
use App\Libs\Vendor\Qiniu\Responses\Bucket\FileListResp;
use App\Libs\Vendor\Qiniu\Responses\Upload\UploadResp;
use Qiniu\Config;
use Qiniu\Http\Error;
use Qiniu\Storage\BucketManager;
use Qiniu\Auth;
use Qiniu\Storage\UploadManager;

class Qiniu
{
    protected Auth $auth;
    protected Config $config;
    protected BucketManager $bucketManager;
    protected UploadManager $uploadManager;

    public function __construct(Auth $auth, Config $config = null)
    {
        $this->auth = $auth;
        if (!isset($config)) {
            $config = new Config();
        }
        $this->config = $config;
    }

    /**
     * 获取空间管理对象
     *
     * @return BucketManager
     */
    protected function bucketManager(): BucketManager
    {
        if (!isset($this->bucketManager)) {
            $this->bucketManager = new BucketManager($this->auth, $this->config);
        }

        return $this->bucketManager;
    }

    protected function uploadManager(): UploadManager
    {
        if (!isset($this->uploadManager)) {
            $this->uploadManager = new UploadManager($this->config);
        }

        return $this->uploadManager;
    }

    /**
     * 资源列表
     *
     * @param FileListRequest $request
     * @return FileListResp
     * @throws ApiResponseDataException
     */
    public function getFileList(FileListRequest $request): FileListResp
    {
        $resp = $this->bucketManager()->listFiles($request->bucket, $request->prefix, $request->marker, $request->limit, $request->delimiter);
        if (!isset($resp[0]['items'])) {
            throw new ApiResponseDataException();
        }
        return new FileListResp($resp[0]);
    }

    /**
     * 上传资源
     *
     * @param string $localPath 本地资源路径
     * @param string $bucket 指定空间
     * @param string $key 资源名
     * @return UploadResp
     * @throws ApiResponseErrorException
     * @throws \Exception
     */
    public function upload(string $localPath, string $bucket, string $key): UploadResp
    {
        $token = $this->auth->uploadToken($bucket);
        [$resp, $error] = $this->uploadManager()->putFile($token, $key, $localPath);
        if (isset($error)) {
            /** @var Error $error */
            throw new ApiResponseErrorException("上传资源错误:" . $error);
        }

        return new UploadResp($resp);
    }

    /**
     * 指定空间
     *
     * @param string $key 资源名
     * @param string $bucket 指定空间
     * @throws ApiResponseErrorException
     */
    public function delete(string $key, string $bucket): void
    {
        [$resp, $error] = $this->bucketManager()->delete($bucket, $key);
        if (isset($error)) {
            /** @var Error $error */
            if (HttpCodeEnum::NOT_FOUND === $error->code()) {
                return;
            }
            throw new ApiResponseErrorException("删除资源错误:" . $error->message());
        }
    }
}
