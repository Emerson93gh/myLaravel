<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Libro extends Model
{
    use HasFactory;

    protected $fillable = [
        'titulo',
        'autor_id',
        'ubicacion',
        'cantidad_ejemplares',
        'cantidad_prestados',
        'cantidad_disponibles',
    ];

    public function autor()
    {
        // return $this->hasOne(Autor::class, 'id', 'autor_id');
        return $this->belongsTo(Autor::class);
    }
}
