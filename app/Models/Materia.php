<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Materia extends Model
{
    use HasFactory;
    protected $fillable = ['nombre', 'semestre_id'];

    public function semestres(){
        return $this->belongsTo(Semestre::class, 'semestre_id');
    }
}
