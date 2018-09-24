<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
use App\Tarea;

class Tarea extends model
{
    protected $table = 'tareas';

    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nombre',
        'proyecto_id',
        'descripcion',
        'estado',
        'fecha'
    ];
}
