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
        Schema::create('categorias', function (Blueprint $table) {
            $table->id();
            $table->string('nu_codigo', 100)->unique();
            $table->string('nb_nombre', 100)->unique();
            $table->unsignedBigInteger('empresa_id')->default(1);
            $table->foreign('empresa_id')->references('id')->on('empresas')->restrictOnDelete();
            $table->unsignedBigInteger('user_id')->default(1);
            //$table->foreign('user_id')->references('id')->on('users')->restrictOnDelete();
            $table->smallInteger('status');
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
        Schema::dropIfExists('categorias');
    }
};
