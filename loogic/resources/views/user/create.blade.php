@extends('layouts.app')

@section('content')

@guest

<div class="container">

No tiene permisos para ver esta sección

</div>

@else

<div class="container">

<h1>Usuarios</h1>
<h2>Agregar usuario</h2>


<form method="POST" action="{{route('users.store')}}">

    {{ csrf_field() }}

    <label for="email" class="col-sm-2 col-form-label col-form-label-lg">Email</label>
    <input type="email" name="email" class="form-control form-control-lg" id="email">

    <label for="name" class="col-sm-2 col-form-label col-form-label-lg">Nombre</label>
    <input type="text" name="name" class="form-control form-control-lg" id="name">

    <label for="password" class="col-sm-2 col-form-label col-form-label-lg">Password</label>
    <input type="password" name="password" class="form-control form-control-lg" id="password">

    <br>

    <button type="submit" class="btn btn-primary btn-lg">Enviar</button>

</form>
</div>

@endguest

@endsection