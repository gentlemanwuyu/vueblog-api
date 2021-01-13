<?php

namespace App\Models;


/**
 * App\Models\ArticleData
 *
 * @property int $id
 * @property int $article_id 文章ID
 * @property int $views 浏览量
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|ArticleData newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ArticleData newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ArticleData query()
 * @method static \Illuminate\Database\Eloquent\Builder|ArticleData whereArticleId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ArticleData whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ArticleData whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ArticleData whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ArticleData whereViews($value)
 * @mixin \Eloquent
 */
class ArticleData extends BaseModel
{

}
