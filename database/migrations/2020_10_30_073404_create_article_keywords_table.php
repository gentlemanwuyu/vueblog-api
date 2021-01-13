<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateArticleKeywordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        \Schema::create('article_keywords', function (Blueprint $table) {
            $table->id();
            $table->integer('article_id')->default(0)->comment('文章ID');
            $table->string('keyword')->default('')->comment('关键词');
            $table->index(['article_id', 'keyword']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        \Schema::dropIfExists('article_keywords');
    }
}
