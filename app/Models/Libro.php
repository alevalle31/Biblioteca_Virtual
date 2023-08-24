<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Libro extends Model
{
    protected $fillable = [
        'titulo',
        'autor',
        'editorial',
        'anio',
        'cantidad_disponible',
    ];
    use HasFactory;
}
