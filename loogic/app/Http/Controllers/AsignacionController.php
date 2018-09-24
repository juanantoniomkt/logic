<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Proyecto;
use App\Asignacion;

class AsignacionController extends Controller
{

    public function index()
    {

        $data = 
        [
            'asignaciones'  => Asignacion::all(),
            'proyectos'  => Proyecto::all(),
            'users'   => User::all()
        ];

        return view('asignacion.index')->with($data);
    }

    public function create()
    {

        $data = 
        [
            'proyectos'  => Proyecto::all(),
            'users'   => User::all()
        ];
        

        return view('asignacion.create')->with($data);
    }

    public function store()
    {
        $data = request()->all();

        Asignacion::create(
            [
                'user_id' => $data['user'],
                'proyecto_id' => $data['proyecto']

            ]);

        return redirect('/asignaciones');
    }

    public function destroy($id)
    {

        $asignacion = Asignacion::find($id);

        $asignacion->delete();

        return redirect()->route('asignaciones.index');
    }
}