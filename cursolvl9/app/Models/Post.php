<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    //protected $table = 'otroNombre'; // cuando la tabla tenga un nombre diferente al modelo

    // para utilizar asignaciones masivas se requiere la propiedad fillable
    protected $fillable = ['title', 'body'];
}
