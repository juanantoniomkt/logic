@extends('layouts.app')

@section('content')

@guest

<div class="container">

No tiene permisos para ver esta sección

</div>

@else

<div class="container">

<h1>Tareas</h1>
<h2>Detalle de la tarea</h2>

    <div class="card">

    <div class="card-body">

    <h5 class="card-title">

    <div>
    <span class="badge badge-dark">
    Id de la tarea: {{ $tarea -> id }}
    </span>
    </div>

    Título: {{ $tarea -> nombre }}
    </h5>

    <p class="card-text">
    {{ $tarea -> descripcion }}
    </p>

    </div>
    <ul class="list-group list-group-flush">

            @if($tarea->estado == 1)
            <li class="list-group-item">
            <span class="badge badge-success">Finalizada</span>
            </li>
            @else 
            <li class="list-group-item">
            Estado: 
            <span class="badge badge-danger">Pendiente</span>
            </li>
            @endif

        <li class="list-group-item">
        Proyecto:

        @forelse ($proyectos as $proyecto)

        @if($proyecto->id == $tarea->proyecto_id)

        {{$proyecto->nombre}}

        @endif

       @empty

       @endforelse

        </li>

        <li class="list-group-item">
        Fecha límite: {{ $tarea -> fecha }}
        </li>

    </ul>

</div>

@endguest

@endsection