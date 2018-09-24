@extends('layouts.app')

@section('content')

@guest

<div class="container">

No tiene permisos para ver esta sección

</div>

@else

<div class="container">

<h1>Tareas</h1>
<h2>Listado de tareas</h2>

<table class="table table-bordered">
        <thead>
          <tr>

            <th>Nombre</th>
            <td>Fecha límite</td>
            <th>Estado</th>
            <th></th>

          </tr>
        </thead>
        <tbody>

                @forelse ($tareas as $tarea)
                <tr id="fila{{$tarea->id}}">

                <td>{{$tarea->nombre}}</td>

                <td>{{$tarea->fecha}}</td>

                <td>

                <button onclick="cambiarEstado({{$tarea->id}})" 
                  id="tarea{{$tarea->id}}" value="{{ $tarea -> id }}" 
                    class="btn badge estado {{$tarea->estado ? 'badge-success': 'badge-danger'}}">{{$tarea->estado ? 'Finalizada': 'Pendiente'}}</button>            

                </td>

                <td>

                <form action="javascript:void(0);" method="POST" onsubmit="eliminarTarea({{$tarea->id}})">

                  {{ csrf_field() }}
                  {{ method_field('DELETE') }}

                  <button class="btn btn-danger" type="submit">Eliminar</button>

                </form>

                <a href="{{ route('tareas.edit', $tarea->id) }}" class="btn btn-primary">Editar</a>
                <a href="{{ route('tareas.show', $tarea->id) }}" class="btn btn-outline-secondary">Ver</a>

                </td>


               @empty

               @endforelse

          </tr>
        </tbody>
      </table>

    </div>

    <div id="result">

    </div>

@endguest

@endsection
