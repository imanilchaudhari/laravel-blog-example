<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMediaCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('media_comments', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('media_id');
            $table->text('author')->nullable();
            $table->string('email')->nullable();
            $table->string('url')->nullable();
            $table->string('ip');
            $table->text('content');
            $table->string('status');
            $table->string('agent');
            $table->integer('parent')->default(0);
            $table->integer('user_id');
            $table->timestamps();

            $table->foreign('media_id')->references('id')->on('medias')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('media_comments');
    }
}
