<?php

namespace App\Http\Controllers;
use App\Tarea;
use App\Proyecto;

use Illuminate\Http\Request;

class TareaController extends Controller
{
    public function index()
    {
        return view('tarea.index')->with('tareas', Tarea::all());
    }

    public function create()
    {
        return view('tarea.create')->with('proyectos', Proyecto::all());
    }

    public function edit($id)
    {
        $tarea = Tarea::find($id);

        return view('tarea.edit', ['tarea' => $tarea])->with('proyectos', Proyecto::all());
    }

    public function update (Request $request, $id)
    {
        $tarea = Tarea::find($id);

        $tarea-> nombre = $request->nombre;

        $tarea-> descripcion = $request->descripcion;

        $tarea-> estado = $request->estado;

        $tarea-> fecha = $request->fecha;

        $tarea-> proyecto_id = $request->proyecto;

        $tarea -> save();

        return redirect()->route('tareas.index');
        
    }

    public function store()
    {
        $data = request()->all();

        Tarea::create(
            [
                'nombre' => $data['nombre'],
                'descripcion' => $data['descripcion'],
                'estado' => $data['estado'],
                'fecha' => $data['fecha'],
                'proyecto_id' => $data['proyecto']

            ]);

        return redirect('/tareas');
    }

    public function destroy($id)
    {

        $tarea = Tarea::find($id);

        $tarea->delete();

        //return redirect()->route('tareas.index');
    }

    public function show ($id)
    {
        $tarea = Tarea::find($id);

        return (view('tarea.show', compact ('tarea')))->with('proyectos', Proyecto::all());

    }

    public function cambiarEstado($id_tarea){
        $tarea = Tarea::find($id_tarea);
        $tarea->estado = !$tarea->estado;
        $tarea->save();
        return "ok";
    }

}
