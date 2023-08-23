<?php

namespace App\Http\Controllers;

use App\Models\Libro;
use Illuminate\Http\Request;

class librosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $libros = Libro::paginate(10);
        return view('libros.indexLibros', compact('libros'));
    }

    public function create()
    {
        $libro = new Libro();
        return view('libros.CrearLibros', compact('libro'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required',
            'autor' => 'required',
            'editorial' => 'required',
            'anio' => 'required|integer',
            'cantidad_disponible' => 'required|integer',
        ]);

        $libro = new Libro();
        $libro->titulo = $request->titulo;
        $libro->autor = $request->autor;
        $libro->editorial = $request->editorial;
        $libro->anio = $request->anio;
        $libro->cantidad_disponible = $request->cantidad_disponible;
        if( $libro->save()){
            $mensaje = " ¡El libro se agregó exitosamente!";
        }else {
            $mensaje = "No se pudo agregó el libro. Intente nuevamente mas tarde";
        }

        return redirect()->route('libro.index')->with('mensaje', $mensaje);
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\Response
     * Display the specified resource.
     */
    public function show($id)
    {
        //
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\Response
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $libro = Libro::findOrFail($id);
        return view('libros.EditarLibro', compact('libro'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

            $request->validate([
            'titulo' => 'required|max:255',
            'autor' => 'required|max:255',
            'editorial' => 'required|max:255',
            'anio' => 'required|integer',
            'cantidad_disponible'=> 'required|integer',
        ]);

        $libro = Libro::findOrFail($id);
        $libro->titulo = $request->titulo;
        $libro->autor = $request->autor;
        $libro->editorial = $request->editorial;
        $libro->anio = $request->anio;
        $libro->cantidad_disponible = $request->cantidad_disponible;
        if( $libro->save()){
        $mensaje = " ¡El libro se actualizo exitosamente!";
    }else {
        $mensaje = "No se pudo actualizar el libro. Intente nuevamente mas tarde";
    }

        return redirect()->route('libro.index')->with('mensaje', $mensaje);



}

    /**
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(string $id)
    {
        $libro = Libro::findOrFail($id);
        $libro->delete();

        return redirect('/indexLibro')
            ->with('mensaje', '¡El libro fue  borrado exitosamente!');

    }

    public function buscar(Request $request)
    {
        $libros = Libro::where('titulo', 'like', '%'.$request->titulo.'%')->paginate(10);
        return view('libros.indexLibros', compact('libros'));
    }

}
