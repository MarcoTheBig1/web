<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLideresTable extends Migration
{
    public function up()
    {
        Schema::create('lideres', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('apellido');
            $table->string('telefono');
            $table->unsignedBigInteger('distrito_id');
            $table->timestamps();

            $table->foreign('distrito_id')->references('id')->on('distritos')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('lideres');
    }
}
