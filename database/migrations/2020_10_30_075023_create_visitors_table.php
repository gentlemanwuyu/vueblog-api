<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateVisitorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        \Schema::create('visitors', function (Blueprint $table) {
            $table->id();
            $table->string('ip', 1024)->default('')->comment('ip地址');
            $table->string('url', 1024)->default('')->comment('url');
            $table->string('referer')->default('')->comment('referer');
            $table->string('device')->default('')->comment('设备');
            $table->string('route_name')->default('')->comment('路由名称');
            $table->integer('category_id')->default(0)->comment('分类ID');
            $table->integer('article_id')->default(0)->comment('文章ID');
            $table->string('query_string', 1024)->default('')->comment('请求参数');
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'))->comment('创建时间');

            $table->index('route_name');
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
        \Schema::dropIfExists('visitors');
    }
}
