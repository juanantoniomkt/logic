<?php

namespace App;

use App\Proyecto;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class Proyecto extends model
{
    protected $table = 'proyectos';

    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nombre'
    ];

}
