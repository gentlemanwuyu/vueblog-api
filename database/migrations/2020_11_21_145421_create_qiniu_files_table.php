<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateQiniuFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        \Schema::create('qiniu_files', function (Blueprint $table) {
            $table->id();
            $table->string('key')->default('')->comment('文件名');
            $table->string('hash')->default('')->comment('文件的HASH值');
            $table->integer('size')->default(0)->comment('资源内容的大小，单位：字节');
            $table->string('mime_type')->default('')->comment('资源的 MIME 类型');
            $table->bigInteger('put_time')->default(0)->comment('上传时间，单位：100纳秒，其值去掉低七位即为Unix时间戳');
            $table->string('md5')->default('')->comment('文件md5值');
            $table->tinyInteger('type')->default(0)->comment('资源的存储类型，2 表示归档存储，1 表示低频存储，0表示标准存储');
            $table->tinyInteger('status')->default(0)->comment('文件的存储状态，即禁用状态和启用状态间的的互相转换，0表示启用，1表示禁用');
            $table->string('end_user')->nullable()->default(null)->comment('资源内容的唯一属主标识');
            $table->timestamps();

            $table->index('key');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        \Schema::dropIfExists('qiniu_files');
    }
}
