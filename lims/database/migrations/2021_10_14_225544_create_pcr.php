<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePcr extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pcr', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('idPatient');
            $table->string('tenxn');
            $table->string('ketqua');
            $table->string('donvi');
            $table->string('thamkhao')->default(null);
            $table->string('giaxn')->default(null);
            $table->integer('thutien');
            $table->integer('dain');
            $table->string('code');
            $table->string('link');
            $table->unsignedBigInteger('idUser');
            $table->timestamps();
            $table->foreign('idPatient')->references('id')->on('patient');
            $table->foreign('idUser')->references('id')->on('users');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pcr');
    }
}
