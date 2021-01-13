<?php

namespace App\Models;


/**
 * App\Models\ArticleLabel
 *
 * @property int $id
 * @property int $article_id 文章ID
 * @property int $label_id 标签ID
 * @method static \Illuminate\Database\Eloquent\Builder|ArticleLabel newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ArticleLabel newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ArticleLabel query()
 * @method static \Illuminate\Database\Eloquent\Builder|ArticleLabel whereArticleId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ArticleLabel whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ArticleLabel whereLabelId($value)
 * @mixin \Eloquent
 */
class ArticleLabel extends BaseModel
{
    protected $guarded = ['id'];
    public $timestamps = false;
}
