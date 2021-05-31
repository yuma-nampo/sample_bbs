<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');//外部キー(誰のコメントか)
            $table->unsignedBigInteger('post_id');//外部キー(どの投稿に対するコメントか)
            $table->string('body');
            $table->timestamps();

            //user_idをusersテーブルのIDと紐付けている
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            //post_idをpostsテーブルのIDと紐付けている
            $table->foreign('post_id')->references('id')->on('posts')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comments');
    }
}
