@extends('layouts.app')

@section('content')

@guest

<div class="container">
No tiene permisos para ver esta sección
</div>

@else

<div class="container">
    <h1>Proyectos</h1>
    <h2>Listado de proyectos</h2>


          <input type="hidden" name="_token" value="{{ csrf_token() }}" id="token">
          <label for="nombre" class="col-sm-2 col-form-label col-form-label-lg">Nombre</label>
          <input type="text" name="nombre" class="form-control form-control-lg" id="nombre">
        
    
        <br>
    
        <button onclick="incluirProyecto()" type="submit" class="btn btn-primary btn-lg">Enviar</button>
            
    
    <table id="tabla" class="table table-bordered">
            <thead>
              <tr>
    
                <th>Nombre</th>
                <th></th>
    
              </tr>
            </thead>
            <tbody>
    
                    @forelse ($proyectos as $proyecto)
                    <tr>
                      
    
                    <td>{{$proyecto->nombre}}</td>
                    <td>
    
                  <form method="POST" action="{{route('proyectos.destroy', $proyecto->id)}}">
    
                  {{ csrf_field() }}
                  {{ method_field('DELETE') }}
    
                  <button class="btn btn-danger" type="submit">Eliminar</button>
    
                  </form>
    
                  <a href="{{ route('proyectos.edit', $proyecto->id) }}" class="btn btn-primary">Editar</a>
    
                  </td>

                  
                   @empty

                   @endforelse
                   
              </tr>
            </tbody>
          </table>


</div>

@endguest

@endsection
