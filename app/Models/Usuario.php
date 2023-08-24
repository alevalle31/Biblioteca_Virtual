<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    protected $fillable = [
        'nombre',
        'correo_electronico',
        'telefono',
        'direccion_usuario',
    ];
    use HasFactory;
}
