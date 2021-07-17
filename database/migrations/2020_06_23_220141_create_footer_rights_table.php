<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFooterRightsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('footer_rights', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('status')->default(1);
            $table->string('email',200)->nullable();
            $table->string('phone',200)->nullable();
            $table->string('address',500)->nullable();
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
        Schema::dropIfExists('footer_rights');
    }
}