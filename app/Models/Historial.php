<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Historial extends Model
{
    use HasFactory;
    protected $fillable = [
        'asignacion_aulas_id',
        'user_id',
        'fecha',
        // Otros campos...
    ];

    public function asignacionAula()
    {
        return $this->belongsTo(AsignacionAula::class)->onDelete('cascade');;
    }

   
}
