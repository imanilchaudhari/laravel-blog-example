<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->integer('author');
            $table->integer('type');
            $table->string('title');
            $table->string('slug');
            $table->text('excerpt')->nullable();
            $table->text('content')->nullable();
            $table->string('status', 10)->default('publish');
            $table->string('comment_status', 10)->default('open');
            $table->integer('comment_count', 10)->default(0);
            $table->timestamps();

            $table->foreign('author')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('type')->references('id')->on('post_types')->onDelete('cascade');
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
