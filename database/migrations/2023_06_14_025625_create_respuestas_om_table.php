<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRespuestasOmTable extends Migration
{
    public function up()
    {
        Schema::create('respuestas_om', function (Blueprint $table) {
            $table->id('idOM');
            $table->unsignedBigInteger('idPregunta');
            $table->string('Respuesta');
            $table->timestamps();

            $table->foreign('idPregunta')->references('idPregunta')->on('preguntas')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('respuestas_om');
    }
}

