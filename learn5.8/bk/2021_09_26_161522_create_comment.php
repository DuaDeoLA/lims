<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateComment extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Comment', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('idUser');
            $table->foreign('idUser')->references('id')->on('Users');
            $table->unsignedBigInteger('idTinTuc');
            $table->foreign('idTinTuc')->references('id')->on('TinTuc');
            $table->string('NoiDung');
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
        Schema::dropIfExists('Comment');
    }
}
