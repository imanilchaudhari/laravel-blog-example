<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMediasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medias', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('author');
            $table->integer('post_id')->nullable();
            $table->string('title');
            $table->string('slug');
            $table->text('excerpt');
            $table->text('content');
            $table->string('mime_type');
            $table->string('password');
            $table->string('comment_status', 10)->default('open');
            $table->integer('comment_count', 10)->default(0);
            $table->timestamps();

            $table->foreign('author')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('medias');
    }
}
