<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateArticleLabelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        \Schema::create('article_labels', function (Blueprint $table) {
            $table->id();
            $table->integer('article_id')->default(0)->comment('文章ID');
            $table->integer('label_id')->default(0)->comment('标签ID');
            $table->index('article_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        \Schema::dropIfExists('article_labels');
    }
}
