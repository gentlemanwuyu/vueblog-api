<?php

namespace App\Models;


/**
 * App\Models\Visitor
 *
 * @property int $id
 * @property string $ip ip地址
 * @property string $url url
 * @property string $referer referer
 * @property string $device 设备
 * @property string $route_name 路由名称
 * @property int $category_id 分类ID
 * @property int $article_id 文章ID
 * @property string $query_string 请求参数
 * @property \Illuminate\Support\Carbon $created_at 创建时间
 * @method static \Illuminate\Database\Eloquent\Builder|Visitor newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Visitor newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Visitor query()
 * @method static \Illuminate\Database\Eloquent\Builder|Visitor whereArticleId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Visitor whereCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Visitor whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Visitor whereDevice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Visitor whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Visitor whereIp($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Visitor whereQueryString($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Visitor whereReferer($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Visitor whereRouteName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Visitor whereUrl($value)
 * @mixin \Eloquent
 */
class Visitor extends BaseModel
{
    protected $guarded = ['id', 'created_at'];

    const UPDATED_AT = null;
}
