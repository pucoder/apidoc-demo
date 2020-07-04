<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id()->comment('主键');
            $table->string('name')->nullable()->comment('名称');
            $table->string('mobile',64)->nullable()->unique()->comment('电话号码');
            $table->string('email',64)->nullable()->unique()->comment('电子邮箱');
            $table->string('api_token', 80)->nullable()->unique()->comment('API认证Token');
            $table->string('password')->nullable()->comment('哈希密码');
            $table->string('avatar')->nullable()->comment('头像');
            $table->rememberToken()->comment('认证持久化Token');
            $table->integer('status')->default(1)->comment('状态(0:禁用，1：启用)');
            $table->timestamp('email_verified_at')->nullable()->comment('邮箱认证时间');
            $table->softDeletes()->comment('软删除');
            $table->timestamps();
        });
        DB::statement("ALTER TABLE `users` comment'用户表'"); // 表注释
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
