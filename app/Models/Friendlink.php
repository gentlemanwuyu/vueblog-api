<?php
/**
 * Created by PhpStorm
 * User: Woozee
 * Date: 2020/10/30
 * Time: 10:26
 */

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * App\Models\Friendlink
 *
 * @property int $id
 * @property string $name 友情链接名
 * @property string $link 链接
 * @property string $desc 简介
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @method static \Illuminate\Database\Eloquent\Builder|Friendlink newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Friendlink newQuery()
 * @method static \Illuminate\Database\Query\Builder|Friendlink onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Friendlink query()
 * @method static \Illuminate\Database\Eloquent\Builder|Friendlink whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Friendlink whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Friendlink whereDesc($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Friendlink whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Friendlink whereLink($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Friendlink whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Friendlink whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|Friendlink withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Friendlink withoutTrashed()
 * @mixin \Eloquent
 */
class Friendlink extends BaseModel
{
    use SoftDeletes, HasFactory;

    protected $guarded = ['id', 'created_at', 'updated_at', 'deleted_at'];
}
