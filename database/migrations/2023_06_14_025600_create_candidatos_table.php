<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCandidatosTable extends Migration
{
    public function up()
    {
Schema::create('candidatos', function (Blueprint $table) {
    $table->id();
    $table->string('nombre');
    $table->string('apellido_paterno');
    $table->string('apellido_materno');
    $table->string('email');
    $table->string('telefono');
    $table->string('partido_politico');
    $table->string('foto');
    $table->text('biografia');
    $table->string('estado');
    $table->unsignedBigInteger('eleccion_id');
    $table->integer('edad');
    $table->string('posicion');
    $table->timestamps();

    $table->foreign('eleccion_id')->references('id')->on('elecciones');
});

        
    }

    public function down()
    {
        Schema::dropIfExists('candidatos');
    }
}


