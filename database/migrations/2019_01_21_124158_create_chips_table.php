<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChipsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chips', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('Porta');
            $table->integer('Chipeira_id');
            $table->foreign('Chipeira_id')->references('id')->on('chipeiras');
            $table->string('IMEI');
            $table->string('Numero');
            $table->integer('Diario');
            $table->integer('Mensal');
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
        Schema::dropIfExists('chips');
    }
}
