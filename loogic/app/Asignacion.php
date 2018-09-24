<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
use App\Asignacion;

class Asignacion extends Model
{
    use Notifiable;

    protected $table = 'asignaciones';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'proyecto_id'
    ];

}