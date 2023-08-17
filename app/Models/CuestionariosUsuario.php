<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CuestionariosUsuario extends Model
{
    use HasFactory;

    protected $table = 'cuestionarios_usuario';
    protected $primaryKey = 'idCU';
    protected $fillable = [
        'idCuestionario',
        'FechaInicio',
        'FechaFin',
        'idUsuario',
        'idUsuarioOperador',
    ];

    public function cuestionario()
    {
        return $this->belongsTo(Cuestionario::class, 'idCuestionario');
    }

    public function usuario()
    {
        return $this->belongsTo(User::class, 'idUsuario');
    }

    public function usuarioOperador()
    {
        return $this->belongsTo(User::class, 'idUsuarioOperador');
    }
    
    public function respuestasUsuario()
    {
        return $this->hasMany(RespuestaUsuario::class, 'idCU', 'idCU');
    }
}

