<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prestamo extends Model
{
    public function libro() {
        return $this->belongsTo('App\Models\Libro', 'libro_id');
    }

    public function usuario() {
        return $this->belongsTo('App\Models\Usuario', 'usuario_id');
    }

    protected $fillable = [
        'fecha_solicitud',
        'fecha_prestamo',
        'fecha_devolucion',
        'libro_id',
        'usuario_id',
    ];
    use HasFactory;
}
