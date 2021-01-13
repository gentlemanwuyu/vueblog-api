<?php

namespace App\Models;


/**
 * App\Models\ArticleKeyword
 *
 * @property int $id
 * @property int $article_id 文章ID
 * @property string $keyword 关键词
 * @method static \Illuminate\Database\Eloquent\Builder|ArticleKeyword newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ArticleKeyword newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ArticleKeyword query()
 * @method static \Illuminate\Database\Eloquent\Builder|ArticleKeyword whereArticleId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ArticleKeyword whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ArticleKeyword whereKeyword($value)
 * @mixin \Eloquent
 */
class ArticleKeyword extends BaseModel
{
    protected $guarded = ['id'];
    public $timestamps = false;
}
