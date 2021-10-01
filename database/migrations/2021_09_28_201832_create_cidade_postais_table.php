<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCidadePostaisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cidade_postais', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('fk_cidade_id')->unsigned()->index();
            $table->string('nome');
            $table->foreign('fk_cidade_id')->references('id')->on('cidades')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cidade_postais');
    }
}
