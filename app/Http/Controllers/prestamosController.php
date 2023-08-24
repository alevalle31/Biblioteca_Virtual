<?php

namespace App\Http\Controllers;

use App\Models\Libro;
use App\Models\Prestamo;
use App\Models\Usuario;
use Illuminate\Http\Request;

class prestamosController extends Controller
{

    public function index()
    {
        $prestamos = Prestamo::paginate(10);
        return view('prestamos.indexPrestamo', compact('prestamos'));
    }

    public function create()
    {
        $prestamos = new Prestamo();
        $libros = Libro::all();
        $usuarios = Usuario::all();

        return view('prestamos.crearPrestamo', compact('libros', 'usuarios'));
    }

    public function store(Request $request)
    {

        $validatedData = $request->validate([
            'fecha_solicitud' => 'required',
            'fecha_prestamo' => 'required',
            'fecha_devolucion' => 'required',
            'libro_id' => 'required|integer',
            'usuario_id' => 'required|integer',
        ]);

        $prestamo = new Prestamo;
        $prestamo->fecha_solicitud = $request->input('fecha_solicitud');
        $prestamo->fecha_prestamo = $request->input('fecha_prestamo');
        $prestamo->fecha_devolucion = $request->input('fecha_devolucion');
        $prestamo->libro_id = $request->input('libro_id');
        $prestamo->usuario_id = $request->input('usuario_id');
        if($prestamo->save()){
            $mensaje = " ¡El prestamo se fue realizado exitosamente!";
        }else {
            $mensaje = "No se pudo realizar el prestamo. Intente nuevamente mas tarde";
        }

        return redirect()->route('prestamo.index')->with('mensaje', $mensaje);
    }

    /**
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit( $id)
    {
        $prestamo = Prestamo::find($id);
        $libros = Libro::all();
        $usuarios = Usuario::all();

        return view('prestamos.editarPrestamo', compact('prestamo', 'libros', 'usuarios'));
    }

    /**
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $validatedData = $request->validate([
            'fecha_solicitud' => 'required',
            'fecha_prestamo' => 'required',
            'fecha_devolucion' => 'required',
            'libro_id' => 'required|integer',
            'usuario_id' => 'required|integer',
        ]);

        $prestamo = Prestamo::find($id);
        $prestamo->fecha_solicitud = $request->input('fecha_solicitud');
        $prestamo->fecha_prestamo = $request->input('fecha_prestamo');
        $prestamo->fecha_devolucion = $request->input('fecha_devolucion');
        $prestamo->libro_id = $request->input('libro_id');
        $prestamo->usuario_id = $request->input('usuario_id');
        if( $prestamo->save()){
            $mensaje = " ¡El prestamo se actualizo exitosamente!";
        }else {
            $mensaje = "No se pudo actualizar el prestamo. Intente nuevamente de nuevo";
        }

        return redirect()->route('prestamo.index')->with('mensaje', $mensaje);
    }

    /**
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        $prestamo = Prestamo::findOrFail($id);
        $prestamo->delete();

        return redirect('/indexPrestamo')
            ->with('mensaje', '¡El prestamos fue eliminado exitosamente!');
    }

    public function buscar(Request $request)
    {
        $busqueda = $request->input('buscar');
        $prestamos = Prestamo::where('id', 'LIKE', '%' . $busqueda . '%')
            ->orWhere('fecha_solicitud', 'LIKE', '%' . $busqueda . '%')
            ->orWhere('fecha_prestamo', 'LIKE', '%' . $busqueda . '%')
            ->orWhere('fecha_devolucion', 'LIKE', '%' . $busqueda . '%')
            ->paginate(10);
        $prestamos->appends(['busqueda' => $busqueda]);
        return view('prestamos.indexPrestamo', compact('prestamos'));

    }
}
