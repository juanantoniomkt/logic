<?php

namespace App\Http\Controllers;

use App\Tarea;
use App\Proyecto;
use App\Asignacion;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function index()
    {

        $data = 
        [
            'proyectos'  => Proyecto::all(),
            'tareas'   => Tarea::all(),
            'asignaciones'   => Asignacion::all()
        ];

        return view('home')->with($data);
    }

}
