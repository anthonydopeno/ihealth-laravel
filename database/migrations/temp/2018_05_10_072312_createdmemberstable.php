<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Createdmemberstable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dmembers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('eduid');
            $table->string('epuid');
            $table->foreign('eduid')->references('duid')->on('doctor');
            $table->foreign('epuid')->references('puid')->on('patient');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dmembers');
    }
}
