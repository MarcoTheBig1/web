<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePreguntasTable extends Migration
{
    public function up()
    {
        Schema::create('preguntas', function (Blueprint $table) {
            $table->id('idPregunta');
            $table->unsignedBigInteger('idCuestionario');
            $table->text('Pregunta');
            $table->unsignedBigInteger('idTipoPregunta');
            
            $table->timestamps();

            $table->foreign('idCuestionario')->references('idCuestionario')->on('cuestionarios')->onDelete('cascade');
            $table->foreign('idTipoPregunta')->references('idTipoPregunta')->on('tipos_preguntas')->onDelete('cascade');
        });
    }
    

    public function down()
    {
        Schema::dropIfExists('preguntas');
    }
}
