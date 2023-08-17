<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSectoresTable extends Migration
{
    public function up()
    {
        Schema::create('sectores', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->unsignedBigInteger('user_id'); // Agregar la columna user_id
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users'); // Agregar la relación con la tabla users
        });
    }

    public function down()
    {
        Schema::dropIfExists('sectores');
    }
}

