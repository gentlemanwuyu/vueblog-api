<?php

namespace App\Models;

/**
 * App\Models\QiniuFile
 *
 * @property int $id
 * @property string $key 文件名
 * @property string $hash 文件的HASH值
 * @property int $size 资源内容的大小，单位：字节
 * @property string $mime_type 资源的 MIME 类型
 * @property int $put_time 上传时间，单位：100纳秒，其值去掉低七位即为Unix时间戳
 * @property string $md5 文件md5值
 * @property int $type 资源的存储类型，2 表示归档存储，1 表示低频存储，0表示标准存储
 * @property int $status 文件的存储状态，即禁用状态和启用状态间的的互相转换，0表示启用，1表示禁用
 * @property string|null $end_user 资源内容的唯一属主标识
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|QiniuFile newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|QiniuFile newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|QiniuFile query()
 * @method static \Illuminate\Database\Eloquent\Builder|QiniuFile whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|QiniuFile whereEndUser($value)
 * @method static \Illuminate\Database\Eloquent\Builder|QiniuFile whereHash($value)
 * @method static \Illuminate\Database\Eloquent\Builder|QiniuFile whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|QiniuFile whereKey($value)
 * @method static \Illuminate\Database\Eloquent\Builder|QiniuFile whereMd5($value)
 * @method static \Illuminate\Database\Eloquent\Builder|QiniuFile whereMimeType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|QiniuFile wherePutTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|QiniuFile whereSize($value)
 * @method static \Illuminate\Database\Eloquent\Builder|QiniuFile whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|QiniuFile whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|QiniuFile whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class QiniuFile extends BaseModel
{
    protected $guarded = ['id', 'created_at', 'updated_at'];
}
