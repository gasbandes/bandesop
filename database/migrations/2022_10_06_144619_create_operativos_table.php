<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOperativosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('operativo', function (Blueprint $table) {
            $table->increments('id');
            $table->foreignId('usuario_id')->references('id')->on('users');
            $table->foreignId('personal_id')->references('id')->on('personals');
            $table->foreignId('ente_id')->references('id')->on('empresas');
            $table->foreignId('gerencia_id')->references('id')->on('gerencias');
            $table->unsignedBigInteger('producto_id')->default(1);
            //$table->foreign('producto_id')->references('id')->on('productos');
            $table->string('mes');
            $table->string('year');
            $table->string('hora');
            $table->integer('cantidad')->default(1);
            $table->string('confirmed')->default(0);
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
        Schema::dropIfExists('operativos');
    }
}
