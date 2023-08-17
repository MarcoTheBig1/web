<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEleccionesTable extends Migration
{
    public function up()
    {
        Schema::create('elecciones', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->text('descripcion');
            $table->date('fecha_inicio');
            $table->date('fecha_fin');
            $table->string('estado');
            $table->string('posicion'); // Agrega este campo para la posición del candidato en la elección
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('elecciones');
    }
}


