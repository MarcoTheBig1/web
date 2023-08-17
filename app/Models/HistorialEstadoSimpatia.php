<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HistorialEstadoSimpatia extends Model
{
    protected $table = 'historial_estado_simpatia';
    protected $fillable = [
        'persona_id',
        'estado_simpatia_id',
        'fecha',
    ];

    public function persona()
    {
        return $this->belongsTo(Persona::class);
    }

    public function estadoSimpatia()
    {
        return $this->belongsTo(EstadoSimpatia::class);
    }
}
