<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('prestamos', function (Blueprint $table) {
            $table->id();
            $table->dateTime('fecha_solicitud');
            $table->dateTime('fecha_prestamo');
            $table->dateTime('fecha_devolucion');
            $table->unsignedBigInteger('libro_id');
            $table->unsignedBigInteger('usuario_id');
            $table->foreign('libro_Id')->references('id')->on('libros');
            $table->foreign('usuario_Id')->references('id')->on('usuarios');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('prestamos');
    }
};
