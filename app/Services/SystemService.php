<?php
/**
 * 系统服务类
 * User: Woozee
 * Date: 2020/12/13
 * Time: 0:42
 */

namespace App\Services;

use App\Enum\Qiniu\KeyPrefixEnum;
use App\Enum\SystemConfigKeyEnum;
use App\Http\Requests\Admin\SystemConfigRequest;
use App\Libs\Exceptions\BusinessException;
use App\Libs\Exceptions\FatalErrorException;
use App\Models\SystemConfig;
use App\Responses\Admin\Qiniu\QiniuUploadResp;
use App\Responses\Admin\System\SystemConfigResp;
use Illuminate\Http\UploadedFile;

class SystemService extends BaseService
{
    protected QiniuService $qiniuService;

    public function __construct(QiniuService $qiniuService)
    {
        $this->qiniuService = $qiniuService;
    }

    /**
     * 获取系统配置
     *
     * @return SystemConfigResp
     */
    public function getConfig(): SystemConfigResp
    {
        $configKeyList = SystemConfigKeyEnum::getKeys();
        $configList = SystemConfig::whereIn('name', $configKeyList)->pluck('value', 'name')->toArray();
        $resp = SystemConfigResp::fromItem($configList);
        $keywordList = explode(',', $configList['keywords']);
        $resp->keyword_list = $keywordList;

        return $resp;
    }

    /**
     * 前端系统配置
     *
     * @return \App\Responses\Front\System\SystemConfigResp
     */
    public function getFrontConfig(): \App\Responses\Front\System\SystemConfigResp
    {
        $configKeyList = SystemConfigKeyEnum::getKeys();
        $configList = SystemConfig::whereIn('name', $configKeyList)
            ->where('name', '!=', SystemConfigKeyEnum::ABOUT)
            ->pluck('value', 'name')
            ->toArray();
        $resp = \App\Responses\Front\System\SystemConfigResp::fromItem($configList);
        $keywordList = explode(',', $configList['keywords']);
        $resp->keyword_list = $keywordList;

        return $resp;
    }

    /**
     * 保存系统配置
     *
     * @param SystemConfigRequest $request
     * @throws FatalErrorException
     * @throws \Throwable
     */
    public function saveConfig(SystemConfigRequest $request): void
    {
        try {
            \DB::beginTransaction();
            foreach (SystemConfigKeyEnum::getKeys() as $key) {
                $value = $key === 'keywords' ? implode(',', $request->get('keyword_list', [])) : $request->get($key, '');
                SystemConfig::updateOrCreate(['name' => $key], [
                    'name' => $key,
                    'value' => $value,
                ]);
            }
            \DB::commit();
        } catch (\Throwable $e) {
            \DB::rollBack();
            throw new FatalErrorException("系统出错");
        }
    }

    /**
     * 获取关于
     *
     * @return string
     */
    public function getAbout(): string
    {
        return SystemConfig::where('name', SystemConfigKeyEnum::ABOUT)->value('value');
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
        return $this->qiniuService->upload($file, KeyPrefixEnum::ABOUT);
    }
}
