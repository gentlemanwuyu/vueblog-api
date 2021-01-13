<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        \Schema::create('articles', function (Blueprint $table) {
            $table->id();
            $table->string('title')->default('')->comment('标题');
            $table->text('content')->comment('内容');
            $table->string('summary', 1024)->default('')->comment('摘要');
            $table->integer('summary_image_id')->default(0)->comment('摘要图片ID');
            $table->integer('category_id')->default(0)->comment('分类ID');
            $table->timestamps();
            $table->softDeletes();
            $table->index('title');
            $table->index('category_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        \Schema::dropIfExists('articles');
    }
}
