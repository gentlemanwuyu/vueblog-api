<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateArticleDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        \Schema::create('article_data', function (Blueprint $table) {
            $table->id();
            $table->integer('article_id')->default(0)->comment('文章ID');
            $table->integer('views')->default(0)->comment('浏览量');
            $table->timestamps();
            $table->unique('article_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        \Schema::dropIfExists('article_data');
    }
}
