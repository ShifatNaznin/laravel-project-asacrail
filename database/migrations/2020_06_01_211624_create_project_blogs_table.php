<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectBlogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('project_blogs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('project_status')->default(1);
            $table->string('project_name',200)->nullable();
            $table->string('project_title',200)->nullable();
            $table->text('project_description')->nullable();
            $table->string('project_photo',200)->nullable();
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
        Schema::dropIfExists('project_blogs');
    }
}