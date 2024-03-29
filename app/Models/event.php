<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;
    protected $fillable = ['id_profesor', 'id_aula', 'dia', 'hora_inicio', 'hora_fin'];
}
