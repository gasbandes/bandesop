<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLineaProductosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('linea_productos', function (Blueprint $table) {
            $table->id();
            $table->string('mes');
            $table->string('year');
            $table->string('hora');
            $table->integer('cantidad')->default(1);
            $table->unsignedBigInteger('operativo_id')->default(1);
            $table->unsignedBigInteger('producto_id')->default(1);
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
        Schema::dropIfExists('linea_productos');
    }
}
