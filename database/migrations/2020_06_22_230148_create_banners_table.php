<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBannersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('banners', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('status')->default(1);
            $table->string('title',200)->nullable();
            $table->text('description')->nullable();
            $table->string('photo',200)->nullable();
            $table->string('title_two',200)->nullable();
            $table->text('description_two')->nullable();
            $table->string('photo_two',200)->nullable();
            $table->string('title_three',200)->nullable();
            $table->text('description_three')->nullable();
            $table->string('photo_three',200)->nullable();
            $table->string('title_four',200)->nullable();
            $table->text('description_four')->nullable();
            $table->string('photo_four',200)->nullable();
            $table->string('title_five',200)->nullable();
            $table->text('description_five')->nullable();
            $table->string('photo_five',200)->nullable();
            $table->string('title_six',200)->nullable();
            $table->text('description_six')->nullable();
            $table->string('photo_six',200)->nullable();
            $table->string('title_seven',200)->nullable();
            $table->text('description_seven')->nullable();
            $table->string('photo_seven',200)->nullable();
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
        Schema::dropIfExists('banners');
    }
}