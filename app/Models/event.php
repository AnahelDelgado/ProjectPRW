<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class event extends Model
{
    use HasFactory;
    
    static $reglas = [
        'id_profesor' => 'required',
        'id_aula' => 'required',
        'start' => 'required',
        'startTime' => 'required',
        'endTime' => 'required'
    ];

    protected $fillable = ['id_profesor', 'id_aula', 'start_date', 'endTime'];
}
