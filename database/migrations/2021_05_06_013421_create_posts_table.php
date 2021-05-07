<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->bigIncrements('id');
            //uBigIncrementsはusersテーブルと合わせる
            $table->unsignedBigInteger('user_id'); //外部キー(誰の投稿か)
            $table->string('title');
            $table->text('body');
            $table->timestamps();

            //user_idをusersテーブルのIDと紐付けている
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
}
