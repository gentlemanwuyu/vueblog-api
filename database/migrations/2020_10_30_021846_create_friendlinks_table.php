<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateFriendlinksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        \Schema::create('friendlinks', function (Blueprint $table) {
            $table->id();
            $table->string('name')->default('')->comment('友情链接名');
            $table->string('link')->default('')->comment('链接');
            $table->string('desc')->default('')->comment('简介');
            $table->timestamps();
            $table->softDeletes();
            $table->index('name');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        \Schema::dropIfExists('friendlinks');
    }
}
