@extends('layouts.app')

@section('content')

@guest

<div class="container">

No tiene permisos para ver esta sección

</div

@else

<div class="container">

<h1>Usuarios</h1>
<h2>Modificar usuario</h2>

<form method="POST" action="{{ route('users.update', ['id' => $user->id ]) }}">
    
        {{ csrf_field() }}
    
        {{ method_field('PUT') }}

        <label for="email" class="col-sm-2 col-form-label col-form-label-lg">Email</label>
        <input type="email" value="{{ old('email', $user->email) }}" name="email" class="form-control form-control-lg" id="email">
    
        <label for="name" class="col-sm-2 col-form-label col-form-label-lg">Nombre</label>
        <input type="text" value="{{ old('name', $user->name) }}" name="name" class="form-control form-control-lg" id="name">
    
        <label for="password" class="col-sm-2 col-form-label col-form-label-lg">Password</label>
        <input type="password" value="{{ old('password') }}" name="password" class="form-control form-control-lg" id="password">
    
        <br>
    
        <button type="submit" class="btn btn-primary btn-lg">Actualizar</button>
    
    </form>

</div>

@endguest

@endsection