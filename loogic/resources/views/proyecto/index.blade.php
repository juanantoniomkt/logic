@extends('layouts.app')

@section('content')

@guest

<div class="container">
No tiene permisos para ver esta sección
</div>

@else

<div id="app" class="container">
    <h1>Proyectos</h1>
    <h2>Listado de proyectos</h2>


          <input type="hidden" name="_token" value="{{ csrf_token() }}" id="token">
          <label for="nombre" class="col-sm-2 col-form-label col-form-label-lg">Nombre</label>
          <input type="text" v-model="nombreNuevoProyecto" name="nombre" class="form-control form-control-lg" id="nombre">
        
    
        <br>
    
        <button @click="incluirProyecto()" type="submit" class="btn btn-primary btn-lg">Enviar</button>
            
    
    <table id="tabla" class="table table-bordered">
            <thead>
              <tr>
    
                <th>Nombre</th>
                <th></th>
    
              </tr>
            </thead>
            <tbody>
    
              <tr v-for="(proyecto, index) of proyectos">

                <div>

                    <td v-if="edit_proyecto.id == proyecto.id && editMode == true" >
                        <input v-model="edit_proyecto.nombre" type="text" class="form-control form-control-lg">
                      </td>
    
                      
                      <td v-else>@{{proyecto.nombre}}</td>
                                    
                      
                      <td>
    
                      {{--
                        <form method="POST" action="{{route('proyectos.destroy', proyecto.id)}}">
        
                      {{ csrf_field() }}
                      {{ method_field('DELETE') }}
        
                      <button class="btn btn-danger" type="submit">Eliminar</button>
        
                      </form>                  
                        --}}
      
    
                      <button @click="guardar()" v-if="edit_proyecto.id == proyecto.id && editMode == true" class="btn btn-success">Guardar</button>
                      <a v-else @click="edit(proyecto)" class="btn btn-primary">Editar</a>
    
                      <button @click="eliminar(proyecto, index)" class="btn btn-danger">Eliminar</button>
    
    
                      </td>

                </div>
                   
              </tr>
            </tbody>
          </table>


</div>

@endguest

@endsection

@section('js')

<script>

var app = new Vue({

  el: '#app',

  data: 
  {
    proyectos : {!! $proyectos !!},
    edit_proyecto: {},
    delete_proyecto: {},
    editMode : false,
    nombreNuevoProyecto: ''
  },

    methods:
    {
      edit: function(proyecto) 
      {

        this.editMode = true;

        this.edit_proyecto = proyecto;


      },

      guardar: function()
      {

        this.editMode = false;

        const params =
        {
            nombre : this.edit_proyecto.nombre
        };

        axios.put(`/proyectos/${this.edit_proyecto.id}`, params).then((response) =>
        {


            const proyecto = response.data;

            this.$emit('update', proyecto);


        });


      },

      eliminar: function(proyecto, index)
      {
        

        this.delete_proyecto = proyecto;

        axios.delete(`/proyectos/${this.delete_proyecto.id}`).then((data) =>
        {

          this.proyectos.splice(index,1);

            this.$emit('delete');

        });

      },

      incluirProyecto: function()
      {

                const params = 
                {
                    nombre: this.nombreNuevoProyecto
                }

                this.nombre = '';

                axios.post('/proyectos', params).then((response) => 
                {
                    const proyecto = response.data;
                    this.$emit('store', proyecto);

                    this.nombreNuevoProyecto = '';

                    this.proyectos.unshift(proyecto);


                });

        
      }
      
    }
  

})

</script>
    
@endsection
