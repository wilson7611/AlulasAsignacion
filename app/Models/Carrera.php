<?php

namespace App\Models;

use App\Http\Controllers\DecanaturaController;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Carrera extends Model
{
    use HasFactory;
    protected $fillable = ['nombre', 'decanatura_id'];

    public function decanaturas(){
        return $this->belongsTo(Decanatura::class, 'decanatura_id');
    }
}
