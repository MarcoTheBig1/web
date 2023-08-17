<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCandidatosPorEleccionTable extends Migration
{
    public function up()
    {
        Schema::create('candidatos_por_eleccion', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('candidato_id');
            $table->unsignedBigInteger('eleccion_id');
            $table->string('posicion'); // Agrega este campo para la posición del candidato en la elección
            $table->timestamps();

            $table->foreign('candidato_id')->references('id')->on('candidatos')->onDelete('cascade');
            $table->foreign('eleccion_id')->references('id')->on('elecciones')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('candidatos_por_eleccion');
    }
}
