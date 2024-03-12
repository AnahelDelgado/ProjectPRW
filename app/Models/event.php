<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;
    public function up(): void
    {
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_profesor')->constrained('teachers');
            $table->foreignId('id_aula')->constrained('classrooms');
            $table->date('dia');
            $table->Time('hora_inicio');
            $table->Time('hora_fin');
            $table->timestamps();
        });
    }
}
