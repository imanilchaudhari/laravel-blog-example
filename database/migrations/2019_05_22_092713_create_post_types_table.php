<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('post_types', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 64);
            $table->string('slug', 64);
            $table->text('description')->nullable();
            $table->string('icon', 255)->nullable();
            $table->string('singular_name', 255);
            $table->string('plural_name', 255);
            $table->string('menu_builder', 1)->default(0);
            $table->string('permission', 64);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('post_types');
    }
}
