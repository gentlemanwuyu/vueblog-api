<?php
/**
 * SystemConfig模型
 * User: Woozee
 * Date: 2020/12/13
 * Time: 0:54
 */

namespace App\Models;

/**
 * App\Models\SystemConfig
 *
 * @property int $id
 * @property string $name 配置名
 * @property string $value 配置值
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|SystemConfig newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SystemConfig newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SystemConfig query()
 * @method static \Illuminate\Database\Eloquent\Builder|SystemConfig whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SystemConfig whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SystemConfig whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SystemConfig whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SystemConfig whereValue($value)
 */
class SystemConfig extends BaseModel
{
    protected $guarded = ['id', 'created_at', 'updated_at'];
}
