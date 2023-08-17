<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateTiposComunicacionesTable extends Migration
{
    public function up()
    {
        Schema::create('tipos_comunicaciones', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->timestamps();
        });

        // Insertar los tipos de comunicaciones iniciales
        DB::table('tipos_comunicaciones')->insert([
            ['nombre' => 'Correo electrónico'],
            ['nombre' => 'Llamada telefónica'],
            ['nombre' => 'Mensaje de texto (SMS)'],
            ['nombre' => 'WhatsApp'],
            ['nombre' => 'Redes sociales'],
            ['nombre' => 'Visita presencial'],
            ['nombre' => 'Reunión en persona']
        ]);
    }

    public function down()
    {
        Schema::dropIfExists('tipos_comunicaciones');
    }
}

