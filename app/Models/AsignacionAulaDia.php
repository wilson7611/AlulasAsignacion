<?php

namespace App\Models;

use App\Http\Controllers\DiaController;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AsignacionAulaDia extends Model
{
    use HasFactory;
    protected $fillable = ['asignacion_aulas_dias', 'dia_id'];

    public function dias(){
        return $this->belongsTo(DiaController::class);
    }
}
