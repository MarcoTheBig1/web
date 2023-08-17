<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOpcionRespuestasTable extends Migration
{
    public function up()
    {
        Schema::create('opcion_respuestas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pregunta_id');
            $table->text('contenido');
            $table->timestamps();

            $table->foreign('pregunta_id')->references('idPregunta')->on('preguntas')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('opcion_respuestas');
    }
}
