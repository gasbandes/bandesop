<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personals', function (Blueprint $table) {
            $table->id();
            $table->string('tx_nombres');
            $table->string('tx_apellidos');
            $table->integer('nu_cedula');
            $table->string('fecha_emisison');
            $table->unsignedBigInteger('empresa_id')->default(1);
            $table->foreign('empresa_id')->references('id')->on('empresas')->restrictOnDelete();
            $table->foreignId('gerencia_id')->references('id')->on('gerencias');
            $table->smallInteger('status');
            $table->smallInteger('tipo_empleado');
            $table->unsignedBigInteger('usuario_id')->default(1);
            $table->foreign('usuario_id')->references('id')->on('users')->restrictOnDelete();
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
        Schema::dropIfExists('personals');
    }
};
