<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersonasTable extends Migration
{
    public function up()
    {
        Schema::create('personas', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('apellido');
            $table->string('email')->unique();
            $table->string('telefono');
            $table->string('direccion');
            $table->unsignedBigInteger('colonia_id');
            $table->unsignedBigInteger('estado_id');
            $table->timestamps();

            $table->foreign('colonia_id')->references('id')->on('colonias');
            $table->foreign('estado_id')->references('id')->on('estados_de_simpatia');
        });
    }

    public function down()
    {
        Schema::dropIfExists('personas');
    }
}

