<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSocialMediaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('social_media', function (Blueprint $table) {
            $table->bigIncrements('sm_id');
            $table->string('sm_facebook',190)->nullable();
            $table->string('sm_twitter',190)->nullable();
            $table->string('sm_linkedin',190)->nullable();
            $table->string('sm_youtube',190)->nullable();
            $table->string('sm_google',190)->nullable();
            $table->string('sm_pinterest',190)->nullable();
            $table->integer('sm_status')->default(1);
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
        Schema::dropIfExists('social_media');
    }
}
