<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCuestionariosUsuarioTable extends Migration
{
    public function up()
    {
        Schema::create('cuestionarios_usuario', function (Blueprint $table) {
            $table->id('idCU');
            $table->unsignedBigInteger('idCuestionario');
            $table->dateTime('FechaInicio');
            $table->dateTime('FechaFin')->nullable();
            $table->unsignedBigInteger('idUsuario');
            $table->unsignedBigInteger('idUsuarioOperador');
            $table->timestamps();

            $table->foreign('idCuestionario')->references('idCuestionario')->on('cuestionarios')->onDelete('cascade');
            $table->foreign('idUsuario')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('idUsuarioOperador')->references('id')->on('users')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('cuestionarios_usuario');
    }
}
