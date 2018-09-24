@extends('layouts.app')

@section('content')

@guest

<div class="container">

No tiene permisos para ver esta sección

</div>

@else

<div class="container">

<h1>Usuarios</h1>
<h2>Listado de usuarios</h2>

<table class="table table-bordered">
        <thead>
          <tr>
            <th>id</th>
            <th>nombre</th>
            <th>email</th>
            <th></th>
          </tr>
        </thead>
        <tbody>

                @forelse ($users as $user)
                <tr>
                <td>{{$user->id}}</td>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                <td>

                <form method="POST" action="{{route('users.destroy', $user->id)}}">

                {{ csrf_field() }}
                {{ method_field('DELETE') }}

                <button class="btn btn-danger" type="submit">Eliminar</button>

                </form>

                <a href="{{ route('users.edit', $user->id) }}" class="btn btn-primary">Editar</a>
                </td>
               @empty

               @endforelse

          </tr>
        </tbody>
      </table>

    </div>

@endguest

@endsection