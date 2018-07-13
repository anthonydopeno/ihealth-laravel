<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Createsorttable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sort', function (Blueprint $table) {
            $table->String('duid')->primary();
            $table->String('fname',255);
            $table->String('lname',255);
            $table->String('sp',255);
            $table->String('loc',255);
           // $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sort');
    }
}
