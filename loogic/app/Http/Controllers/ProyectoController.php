<?php

namespace App\Http\Controllers;
use App\Proyecto;
use App\ProyectosUsers;
use App\User;

use Illuminate\Http\Request;

class ProyectoController extends Controller
{
    public function index()
    {

        
        return view('proyecto.index')->with('proyectos', Proyecto::all());
    }

    public function create()
    {

        return view('proyecto.create')->with('users', User::all());
    }

    public function edit($id)
    {
        $proyecto = Proyecto::find($id);

        return view('proyecto.edit', ['proyecto' => $proyecto]);
    }

    public function update (Request $request, $id)
    {
        $proyecto = Proyecto::find($id);

        $proyecto->nombre = $request->nombre;

        $proyecto -> save();

        return $proyecto;        
        
    }

    public function store(Request $request)
    {

        if($request->ajax())
        {

            $proyecto = Proyecto::create($request->all());

            return response()->json(
                [
                    'nombre' => $request['nombre'],
                    'id' => $proyecto->id
                ]);
                
        }


        //return redirect('/proyectos');
    }

    public function destroy($id)
    {

        $proyecto = Proyecto::find($id);

        $proyecto->delete();

        return $proyecto;
    }
}
