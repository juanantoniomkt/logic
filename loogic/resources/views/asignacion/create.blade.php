@extends('layouts.app')

@section('content')

@guest

<div class="container">

No tiene permisos para ver esta sección

</div>

@else

<div class="container">

<h1>asignaciones</h1>
<h2>asignar proyecto</h2>

<form method="POST" action="{{route('asignaciones.store')}}">
        
    {{ csrf_field() }}

    <div class="form-group">
        <label for="proyecto">Selecciona proyecto</label>
        <select class="form-control" id="proyecto" name="proyecto">

                @forelse ($proyectos as $proyecto)
                
                <option value="{{$proyecto->id}}">{{$proyecto->nombre}}</option> 

               @empty

               @endforelse

        </select>
    </div>

    <br>

    <div class="form-group">
            <label for="user">Selecciona usuario</label>
            <select class="form-control" id="user" name="user">
    
                    @forelse ($users as $user)
                    
                    <option value="{{$user->id}}">{{$user->name}}</option> 
    
                   @empty
    
                   @endforelse
    
            </select>
        </div>

    <br>

    <button type="submit" class="btn btn-primary btn-lg">Asignar</button>
        
</form>
</div>

@endguest

@endsection