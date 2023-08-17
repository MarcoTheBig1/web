<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRespuestasUsuarioTable extends Migration
{
    public function up()
    {
        Schema::create('respuestas_usuario', function (Blueprint $table) {
            $table->id('idRU');
            $table->unsignedBigInteger('idCU');
            $table->unsignedBigInteger('idPregunta');
            $table->string('Respuesta');
            $table->timestamps();

            $table->foreign('idCU')->references('idCU')->on('cuestionarios_usuario')->onDelete('cascade');
            $table->foreign('idPregunta')->references('idPregunta')->on('preguntas')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('respuestas_usuario');
    }
}

