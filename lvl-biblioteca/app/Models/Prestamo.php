<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prestamo extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre_persona',
        'libro_id',
        'fecha_prestamo',
        'fecha_devolucion',
    ];

    public function libro()
    {
        return $this->belongsTo(Libro::class);
    }
}
