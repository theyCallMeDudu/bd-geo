<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaisBandeirasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pais_bandeiras', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome');
            $table->integer('fk_pais_id')->unsigned()->index();
            $table->foreign('fk_pais_id')->references('id')->on('pais')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pais_bandeiras');
    }
}
