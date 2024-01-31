<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AsignacionPrevia extends Model
{
    use HasFactory;
    protected $fillable = ['docente_id', 'materia_id', 'turno_id', 'numero_estudiantes', ];

    public function docentes()
    {
        return $this->belongsTo(Docente::class, 'docente_id');
    }
    public function materias()
    {
        return $this->belongsTo(Materia::class, 'materia_id');
    }
    public function turnos()
    {
        return $this->belongsTo(Turno::class, 'turno_id');
    }
    
    public function asignacionAulas()
    {
        return $this->hasMany(AsignacionAula::class, 'asignacion_id');
    }
}
