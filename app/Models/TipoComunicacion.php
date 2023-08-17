<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoComunicacion extends Model
{
    use HasFactory;

    protected $table = 'tipos_comunicaciones';
    protected $fillable = ['nombre'];

    // Relación con la tabla de comunicaciones
    public function comunicaciones()
    {
        return $this->hasMany(Comunicacion::class);
    }
}
