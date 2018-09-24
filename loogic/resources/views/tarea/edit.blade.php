@extends('layouts.app')

@section('content')

@guest

<div class="container">

No tiene permisos para ver esta sección

</div>

@else

<div class="container">

<h1>Tareas</h1>
<h2>Modificar tarea</h2>

    <form method="POST" action="{{ route('tareas.update', ['id' => $tarea->id ]) }}">
    
        {{ csrf_field() }}

        {{ method_field('PUT') }}
    
        <label for="nombre" class="col-sm-2 col-form-label col-form-label-lg">Nombre</label>
        <input type="text" disabled name="nombre" value="{{ old('nombre', $tarea->nombre) }}" class="form-control form-control-lg" id="nombre">
    
        <div class="form-group">
                <label for="descripcion" class="col-sm-2 col-form-label col-form-label-lg">Descripción</label>
                <textarea class="form-control" rows="5" id="descripcion" name="descripcion">{{ old('descripcion', $tarea->descripcion) }}</textarea>
        </div>
    
        <label class="col-sm-2 col-form-label col-form-label-lg" for="estado">Estado</label>
        <select class="form-control" id="estado" name="estado">
    
            <option {{old('estado',$tarea->estado)== '0'? 'selected':''}} value=0>Pendiente</option>
            <option {{old('estado',$tarea->estado)== '1'? 'selected':''}} value=1>Finalizada</option>
    
        </select>

        <label class="col-sm-2 col-form-label col-form-label-lg" for="fecha">Fecha límite</label>
        <input disabled class="form-control form-control-lg" value="{{ old('fecha', $tarea->fecha) }}" type="date" name="fecha" id="fecha">
    
        <label class="col-sm-2 col-form-label col-form-label-lg" for="proyecto">Proyecto</label>
        <select disabled class="form-control" id="proyecto" name="proyecto">
    
                @forelse ($proyectos as $proyecto)
    
                <option {{old('proyecto',$proyecto->id)== $tarea->proyecto_id? 'selected':''}} value="{{$proyecto->id}}">{{$proyecto->nombre}}</option>
    
               @empty
    
               @endforelse
        </select>

        <br>
    
        <button type="submit" class="btn btn-primary btn-lg">Actualizar</button>
    
    </form>

</div>

@endguest

@endsection