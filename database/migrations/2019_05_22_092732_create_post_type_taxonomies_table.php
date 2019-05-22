<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostTypeTaxonomiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('post_type_taxonomies', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('post_type_id');
            $table->integer('taxonomy_id');

            $table->foreign('post_type_id')->references('id')->on('post_types')->onDelete('cascade');
            $table->foreign('taxonomy_id')->references('id')->on('taxonomies')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('post_type_taxonomies');
    }
}
