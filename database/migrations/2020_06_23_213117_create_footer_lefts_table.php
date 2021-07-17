<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFooterLeftsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('footer_lefts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('status')->default(1);
            $table->text('heading')->nullable();
            $table->string('facebook_link',500)->nullable();
            $table->string('twitter_link',500)->nullable();
            $table->string('instagram_link',500)->nullable();
            $table->string('pinterest_link',500)->nullable();
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
        Schema::dropIfExists('footer_lefts');
    }
}