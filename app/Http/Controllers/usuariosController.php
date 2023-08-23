<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;

class usuariosController extends Controller
{
    /**
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usuarios = Usuario::paginate(10);
        return view('usuarios.indexUsuario', compact('usuarios'));
    }

    /**
     * @return \Illuminate\Http\Response
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $usuarios = Usuario::paginate(10);
        return view('usuarios.crearUsuario', compact('usuarios'));
    }

    /**
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nombre' => 'required',
            'correo_electronico' => 'required',
            'telefono' => 'required',
            'direccion_usuario' => 'required|string',
        ]);

        $usuarios = new Usuario();
        $usuarios->nombre = $request->nombre;
        $usuarios->correo_electronico = $request->correo_electronico;
        $usuarios->telefono = $request->telefono;
        $usuarios->direccion_usuario = $request->direccion_usuario;
        if( $usuarios->save()){
            $mensaje = " ¡El usuario se agregó exitosamente!";
        }else {
            $mensaje = "No se pudo agregar el usuario. Intente nuevamente de nuevo";
        }

        return redirect()->route('usuario.index')->with('mensaje', $mensaje);

    }

    /**
     *  @param  int  $id
     * @return \Illuminate\Http\Response
     * Display the specified resource.
     */
    public function show($id)
    {
        //
    }

    /**
     * @param  int  $id
     * @return \Illuminate\Http\Response
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $usuarios = Usuario::findOrFail($id);
        return view('usuarios.editarUsuario', compact('usuarios'));
    }

    /**
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
         $request->validate([
            'nombre' => 'required',
            'correo_electronico' => 'required',
            'telefono' => 'required',
            'direccion_usuario' => 'required|string',
        ]);

        $usuarios = Usuario::findOrFail($id);
        $usuarios->nombre = $request->nombre;
        $usuarios->correo_electronico = $request->correo_electronico;
        $usuarios->telefono = $request->telefono;
        $usuarios->direccion_usuario = $request->direccion_usuario;
        if($usuarios->save()){
            $mensaje = " ¡El usuario se actualizo exitosamente!";
        }else {
            $mensaje = "No se pudo actualizar el usuario. Intente nuevamente mas tarde";
        }

        return redirect()->route('usuario.index')->with('mensaje', $mensaje);

    }

    /**
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $usuarios = Usuario::findOrFail($id);
        $usuarios->delete();

        return redirect('/indexUsuario')
            ->with('mensaje', '¡El usuario fue  borrado exitosamente!');

    }

    public function buscar(Request $request)
    {
        $busqueda = $request->input('busqueda');
        $usuarios = Usuario::where('nombre', 'LIKE', '%' . $busqueda . '%')
            ->orWhere('correo_electronico', 'LIKE', '%' . $busqueda . '%')
            ->orWhere('telefono', 'LIKE', '%' . $busqueda . '%')
            ->orWhere('direccion_usuario', 'LIKE', '%' . $busqueda . '%')
            ->paginate(10);
        $usuarios->appends(['busqueda' => $busqueda]);
        return view('usuarios.indexUsuario', compact('usuarios'));
    }
}
