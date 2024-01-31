<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Historial extends Model
{
    use HasFactory;
    protected $fillable = [
        'materia',
        'docente',
        'turno',
        'aula',
        'capacidad',
        'dias',
        'cantidad_dias',
        'cantidad_estudiantes',
        'confirmado',
        'user_id',
        'fecha',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

   
}
