<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTestnhanh extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('testnhanh', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('idPatient');
            $table->string('tenxn');
            $table->string('ketqua');
            $table->string('donvi');
            $table->string('thamkhao')->default(null);
            $table->string('giaxn')->default(null);
            $table->integer('thutien');
            $table->integer('dain');
            $table->timestamps();
            $table->foreign('idPatient')->references('id')->on('patient');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('testnhanh');
    }
}
