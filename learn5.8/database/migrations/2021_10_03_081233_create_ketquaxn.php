<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKetquaxn extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ketquaxn', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('tenxn');
            $table->string('ketqua');
            $table->string('donvi');
            $table->string('thamkhao')->default(null);
            $table->string('giaxn')->default(null);
            $table->string('maxn');
            $table->string('nhom')->default(null);
            $table->string('stt');
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
        Schema::dropIfExists('ketquaxn');
    }
}
