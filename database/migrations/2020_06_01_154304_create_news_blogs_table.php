<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNewsBlogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news_blogs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('blog_status')->default(1);
            $table->string('blog_name',200)->nullable();
            $table->string('blog_title',200)->nullable();
            $table->text('blog_description')->nullable();
            $table->string('blog_photo',200)->nullable();
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
        Schema::dropIfExists('news_blogs');
    }
}