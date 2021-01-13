<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        \Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->integer('article_id')->default(0)->comment('文章ID');
            $table->text('content')->comment('评论内容');
            $table->string('username')->default('')->comment('用户名');
            $table->string('email')->default('')->comment('用户email');
            $table->string('link')->default('')->comment('用户链接');
            $table->integer('parent_id')->default(0)->comment('主评论ID');
            $table->tinyInteger('is_master')->default(0)->comment('是否博主');
            $table->tinyInteger('source')->default(0)->comment('评论来源, 1为文章, 2为关于');
            $table->timestamps();
            $table->softDeletes();
            $table->index('article_id');
            $table->index('parent_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        \Schema::dropIfExists('comments');
    }
}
