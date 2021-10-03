<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKhaibaoyt extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('khaibaoyt', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('idPatient');
            $table->mediumText('lichsu14');
            $table->integer('trieuchung');
            $table->integer('tiepxuccovid');
            $table->integer('tiepxuctc');
            $table->integer('testnhanh');
            $table->integer('pcrcovid');
            $table->integer('xnthuongquy');
            $table->string('ketluan');
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
        Schema::dropIfExists('khaibaoyt');
    }
}
