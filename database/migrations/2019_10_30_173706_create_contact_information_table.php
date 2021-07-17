<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactInformationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contact_information', function (Blueprint $table) {
            $table->bigIncrements('ci_id');
            $table->string('ci_phone1',20)->nullable();
            $table->string('ci_phone2',20)->nullable();
            $table->string('ci_phone3',20)->nullable();
            $table->string('ci_phone4',20)->nullable();
            $table->string('ci_email1',40)->nullable();
            $table->string('ci_email2',40)->nullable();
            $table->string('ci_email3',40)->nullable();
            $table->string('ci_email4',40)->nullable();
            $table->text('ci_add1')->nullable();
            $table->text('ci_add2')->nullable();
            $table->text('ci_add3')->nullable();
            $table->text('ci_add4')->nullable();
            $table->integer('ci_status')->default(1);
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
        Schema::dropIfExists('contact_information');
    }
}
