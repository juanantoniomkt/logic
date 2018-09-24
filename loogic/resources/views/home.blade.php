@extends('layouts.app')

@section('content')

@guest

<div class="container">

        <h1>desconectado</h1>
    
    </div>
@else

<div class="container">

    <h1>Panel {{ Auth::user()->name }}</h1>
    <h2>Mis tareas</h2>

    @forelse ($asignaciones as $asignacion)

        @if($asignacion->user_id == Auth::user()->id)

            @forelse ($proyectos as $proyecto)

                @if($asignacion->proyecto_id == $proyecto->id)

                    @forelse ($tareas as $tarea)
                    
                        @if($proyecto->id == $tarea->proyecto_id)

                        <div class="card text-white bg-secondary mb-3 float-left tarea" style="max-width: 18rem;">
                        <div class="card-header">

                        @if($tarea->estado == 1)
                        <span class="badge badge-success">Finalizada</span>
                        @else 
                        <span class="badge badge-danger">Pendiente</span>
                        @endif
     
                        <span class="badge badge-light">{{ $proyecto -> nombre }}</span>
                        
                        </div>

                        <div class="card-body">
                        <h5 class="card-title">{{ $tarea -> nombre }}</h5>
                        <p class="card-text">
                        {{ $tarea -> descripcion }}
                        </p>

                        <p class="card-text fecha">
                        Fecha límite
                        <b>{{ $tarea -> fecha }}</b>
                        </p>

                        </div>

                        </div>

                        @endif

                        @empty

                        @endforelse

                    @endif

                @empty
        
            @endforelse

        @endif

    @empty

    @endforelse
    
</div>

@endguest



@endsection