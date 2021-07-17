<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMiddleBlogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('middle_blogs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('middle_status')->default(1);
            $table->string('middle_name',200)->nullable();
            $table->string('middle_title',200)->nullable();
            $table->text('middle_description')->nullable();
            $table->string('middle_photo',200)->nullable();
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
        Schema::dropIfExists('middle_blogs');
    }
}