<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class reserve extends Model
{
    use HasFactory;
    
    static $reglas = [
        'id_profesor' => 'required',
        'id_aula' => 'required',
        'dia' => 'required',
        'hora_inicio' => 'required',
        'hora_fin' => 'required'
    ];

    protected $fillable = ['id_profesor', 'id_aula', 'dia', 'hora_inicio', 'hora_fin', 'cantidad'];
}
