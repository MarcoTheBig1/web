<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comunicacion extends Model
{
    use HasFactory;
    protected $table = 'comunicaciones';
    protected $fillable = [
        'persona_id',
        'users_id',
        'tipo_id',
        'contenido',
        'fecha',
    ];

    // Relación con la tabla de personas
    public function persona()
    {
        return $this->belongsTo(Persona::class, 'persona_id');
    }

    // Relación con la tabla de usuarios
    public function usuario()
    {
        return $this->belongsTo(User::class, 'users_id');
    }

    // Relación con la tabla de tipos de comunicaciones
    public function tipoComunicacion()
    {
        return $this->belongsTo(TipoComunicacion::class, 'tipo_id');
    }
}
