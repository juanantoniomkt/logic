@extends('layouts.app')

@section('content')

@guest

<div class="container">

No tiene permisos para ver esta sección

</div>

@else

<div class="container">

<h1>Proyectos</h1>
<h2>Agregar proyecto</h2>

<!--

<form method="POST" action="{{route('proyectos.store')}}">
        
    {{ csrf_field() }}


    <label for="name" class="col-sm-2 col-form-label col-form-label-lg">Nombre</label>
    <input type="text" name="nombre" class="form-control form-control-lg" id="name">

    <br>

    <button type="submit" class="btn btn-primary btn-lg">Enviar</button>
        
</form>

-->

</div>

@endguest

@endsection