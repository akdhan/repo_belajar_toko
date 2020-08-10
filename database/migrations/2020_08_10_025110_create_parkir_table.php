<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateParkirTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parkir', function (Blueprint $table) {
            $table->bigIncrements('id_parkir');
            $table->enum('kendaraan', ['motor','mobil']);
            $table->unsignedBigInteger('id_custom');

            $table->foreign('id_custom')->references('id_custom')->on('customers');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('parkir');
    }
}
