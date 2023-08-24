<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LibrosController;
use App\Http\Controllers\UsuariosController;
use App\Http\Controllers\PrestamosController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/', function () {
    return view('P');
})->name('principal');

/*Rutas Libros */
Route::get('/indexLibro', [librosController::class, 'index'])->name('libro.index');
Route::get('/CrearLibros', [LibrosController::class, 'create'])->name('libros.create');
Route::post('/indexLibro', [LibrosController::class, 'store'])->name('libros.store');
Route::get('/indexLibro/{libro}/edit', [LibrosController::class, 'edit'])->name('libros.edit');
Route::put('/indexLibro/{libro}', [LibrosController::class, 'update'])->name('libros.update');
Route::delete('/indexLibro/{libro}', [LibrosController::class, 'destroy'])->name('libros.destroy');
Route::get('/buscar', [LibrosController::class, 'buscar'])->name('libros.buscar');


/*Rutas Prestamos */
Route::get('/indexPrestamo', [prestamosController::class, 'index'])->name('prestamo.index');
Route::get('/crearPrestamo', [prestamosController::class, 'create'])->name('prestamo.create');
Route::post('/prestamos', [prestamosController::class, 'store'])->name('prestamos.store');
Route::get('/indexPrestamo/{prestamo}/edit', [prestamosController::class, 'edit'])->name('prestamo.edit');
Route::put('/indexPrestamo/{prestamo}', [prestamosController::class, 'update'])->name('prestamos.update');
Route::delete('/indexPrestamo/{prestamo}', [prestamosController::class, 'destroy'])->name('prestamo.destroy');
Route::get('/buscarPrestamo', [prestamosController::class, 'buscar'])->name('prestamo.buscar');

/*Rutas Usuarios */
Route::get('/indexUsuario', [UsuariosController::class, 'index'])->name('usuario.index');
Route::get('/crearUsuario', [UsuariosController::class, 'create'])->name('usuario.create');
Route::post('/indexUsuario', [UsuariosController::class, 'store'])->name('usuario.store');
Route::get('/indexUsuario{usuario}/edit', [UsuariosController::class, 'edit'])->name('usuario.edit');
Route::put('/indexUsuario/{usuario}', [UsuariosController::class, 'update'])->name('usuario.update');
Route::delete('/indexUsuario/{usuario}', [UsuariosController::class, 'destroy'])->name('usuario.destroy');
Route::get('/buscarUsuario', [UsuariosController::class, 'buscar'])->name('usuarios.buscar');
