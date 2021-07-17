<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticleBlogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('article_blogs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('article_status')->default(1);
            $table->string('article_name',200)->nullable();
            $table->string('article_title',200)->nullable();
            $table->text('article_description')->nullable();
            $table->string('article_photo',200)->nullable();
            $table->string('meta_tag',200)->nullable();
            $table->text('meta_description')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('article_blogs');
    }
}