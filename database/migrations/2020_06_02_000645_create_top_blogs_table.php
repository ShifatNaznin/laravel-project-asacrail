<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTopBlogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('top_blogs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('top_status')->default(1);
            $table->string('top_name',200)->nullable();
            $table->string('top_title',200)->nullable();
            $table->text('top_description')->nullable();
            $table->string('top_photo',200)->nullable();
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
        Schema::dropIfExists('top_blogs');
    }
}