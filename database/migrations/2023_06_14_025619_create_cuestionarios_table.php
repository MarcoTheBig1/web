<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCuestionariosTable extends Migration
{
    public function up()
    {
        Schema::create('cuestionarios', function (Blueprint $table) {
            $table->id('idCuestionario');
            $table->dateTime('fecha_creacion');
            $table->string('nombre_cuestionario');
            $table->text('descripcion_cuestionario');
            $table->boolean('estatus')->default(true);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('cuestionarios');
    }
}
