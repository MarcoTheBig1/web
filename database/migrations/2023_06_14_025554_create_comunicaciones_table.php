<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComunicacionesTable extends Migration
{
    public function up()
    {
        Schema::create('comunicaciones', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('persona_id');
            $table->unsignedBigInteger('users_id');
            $table->unsignedBigInteger('tipo_id'); // Agrega el campo para la clave foránea del tipo de comunicación
            $table->text('contenido');
            $table->date('fecha');
            $table->timestamps();

            $table->foreign('persona_id')->references('id')->on('personas')->onDelete('cascade');
            $table->foreign('users_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('tipo_id')->references('id')->on('tipos_comunicaciones')->onDelete('cascade'); // Agrega la clave foránea al catálogo de tipos de comunicaciones
        });
    }

    public function down()
    {
        Schema::dropIfExists('comunicaciones');
    }
}



