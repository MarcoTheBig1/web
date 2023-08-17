<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTiposPreguntasTable extends Migration
{
    public function up()
    {
        Schema::create('tipos_preguntas', function (Blueprint $table) {
            $table->id('idTipoPregunta');
            $table->string('nombre');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('tipos_preguntas');
    }
}
