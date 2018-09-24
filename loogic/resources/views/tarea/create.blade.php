@extends('layouts.app')

@section('content')

@guest

<div class="container">

No tiene permisos para ver esta sección

</div>

@else

<div class="container">

<h1>Tareas</h1>
<h2>Agregar tarea</h2>

<form method="POST" action="{{route('tareas.store')}}">
        
    {{ csrf_field() }}

    <label for="nombre" class="col-sm-2 col-form-label col-form-label-lg">Nombre</label>
    <input type="text" name="nombre" class="form-control form-control-lg" id="nombre">

    <div class="form-group">
            <label for="descripcion" class="col-sm-2 col-form-label col-form-label-lg">Descripción</label>
            <textarea class="form-control" rows="5" id="descripcion" name="descripcion"></textarea>
    </div>

    <label class="col-sm-2 col-form-label col-form-label-lg" for="estado">Estado</label>
    <select class="form-control" id="estado" name="estado">

        <option value=0>Pendiente</option>
        <option value=1>Finalizada</option>

    </select>

    <label class="col-sm-2 col-form-label col-form-label-lg" for="fecha">Fecha límite</label>
    <input class="form-control form-control-lg" type="date" name="fecha" id="fecha">

    <label class="col-sm-2 col-form-label col-form-label-lg" for="proyecto">Proyecto</label>
    <select class="form-control" id="proyecto" name="proyecto">

            @forelse ($proyectos as $proyecto)

            <option value="{{$proyecto->id}}">{{$proyecto->nombre}}</option>

           @empty

           @endforelse
    </select>

    <br>

    <button type="submit" class="btn btn-primary btn-lg">Enviar</button>
        
</form>

</div>

@endguest

@endsection