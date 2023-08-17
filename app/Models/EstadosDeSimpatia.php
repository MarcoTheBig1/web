<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EstadosDeSimpatia extends Model
{
    protected $table = 'estados_de_simpatia';
    protected $fillable = ['estado'];
}
