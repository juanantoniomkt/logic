@extends('layouts.app')

@section('content')

@guest

<div class="container">

No tiene permisos para ver esta sección

</div>

@else

<div class="container">

<h1>Proyectos</h1>
<h2>Modificar proyecto</h2>

    <form method="POST" action="{{ route('proyectos.update', ['id' => $proyecto->id ]) }}">
    
        {{ csrf_field() }}

        {{ method_field('PUT') }}
    
        <label for="name" class="col-sm-2 col-form-label col-form-label-lg">Nombre</label>
        <input type="text" name="nombre" value="{{ old('nombre', $proyecto->nombre) }}" class="form-control form-control-lg" id="name">

        <br>
    
        <button type="submit" class="btn btn-primary btn-lg">Actualizar</button>
    
    </form>

</div>

@endguest

@endsection