<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChidinh extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chidinh', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('idPatient');
            $table->unsignedBigInteger('idKetqua');
            $table->timestamp('datecreate');
            $table->integer('dathutien');
            $table->integer('dain');
            $table->timestamp('tgianin');
            $table->string('nguoin');
            $table->foreign('idKetqua')->references('id')->on('ketquaxn');
            $table->foreign('idPatient')->references('id')->on('patient');
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
        Schema::dropIfExists('chidinh');
    }
}
