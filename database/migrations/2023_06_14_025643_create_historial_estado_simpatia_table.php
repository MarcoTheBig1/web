<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHistorialEstadoSimpatiaTable extends Migration
{
    public function up()
    {
        Schema::create('historial_estado_simpatia', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('persona_id');
            $table->unsignedBigInteger('estado_simpatia_id');
            $table->date('fecha');
            $table->timestamps();
            
            $table->foreign('persona_id')->references('id')->on('personas')->onDelete('cascade');
            $table->foreign('estado_simpatia_id')->references('id')->on('estados_de_simpatia')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('historial_estado_simpatia');
    }
}
