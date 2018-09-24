@extends('layouts.app')

@section('content')

@guest

<div class="container">

No tiene permisos para ver esta sección

</div>

@else

<div class="container">

<h1>Asignación de proyectos</h1>
<h2>listado de asignaciones</h2>

<a href="{{route('asignaciones.create')}}" class="btn btn-primary">Nueva asignación</a>

<table class="table table-bordered">
        <thead>
          <tr>

            <th>Proyecto</th>
            <th>Usuario</th>

          </tr>
        </thead>
        <tbody>

                @forelse ($asignaciones as $asignacion)
                <tr>

                <td>
                        @forelse ($proyectos as $proyecto)

                        @if($proyecto->id == $asignacion->proyecto_id)
                
                        {{$proyecto->nombre}}
                
                        @endif
                
                       @empty
                
                       @endforelse
                </td>

                <td>
                        @forelse ($users as $user)

                        @if($user->id == $asignacion->user_id)
                
                        {{$user->name}}
                
                        @endif
                
                       @empty
                
                       @endforelse
                </td>


                <td>

                    <form method="POST" action="{{route('asignaciones.destroy', $asignacion->id)}}">

                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}
                
                    <button class="btn btn-danger" type="submit">Eliminar</button>
                
                    </form>

                </td>


               @empty
                   No hay usuarios disponibles
               @endforelse

          </tr>
        </tbody>
      </table>

    </div>

@endguest

@endsection
