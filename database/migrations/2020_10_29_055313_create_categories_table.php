<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        \Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('name')->default('')->comment('分类名');
            $table->integer('parent_id')->default(0)->comment('父分类ID');
            $table->integer('image_id')->default(0)->comment('图片ID');
            $table->timestamps();
            $table->softDeletes();

            $table->index('name');
            $table->index('parent_id');
            $table->index('image_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        \Schema::dropIfExists('categories');
    }
}
