<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Semestre extends Model
{
    use HasFactory;
    protected $fillable = ['numero', 'carrera_id'];

    public function carreras(){
        return $this->belongsTo(Carrera::class, 'carrera_id');
    }
}
