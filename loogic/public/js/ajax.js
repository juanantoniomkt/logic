function cambiarEstado(id_tarea)
{



    $.ajax({
        url: "/cambiar/estado/tarea/" + id_tarea,
    }).done(function() 
    {

        if($("#tarea"+id_tarea).hasClass("badge-success")){
            $("#tarea"+id_tarea).html('Pendiente');
            $("#tarea"+id_tarea).attr('class', 'btn badge badge-danger estado');
        }
        else
        {
            $("#tarea"+id_tarea).html('Finalizada');
            $("#tarea"+id_tarea).attr('class', 'btn badge badge-success estado');
        }


    });
}

function eliminarTarea(id)
{


    $.ajax({
        url: "/borrar/tarea/" + id,
    }).done(function()
    {
        $("#fila"+id).hide();
    });

}

function incluirProyecto()
{

    var nombre = $("#nombre").val();
    var route = "http://localhost:8000/proyectos";
    var token = $("#token").val();


    $.ajax(
        {
            url: route,
            headers: {'X-CSRF-TOKEN': token},
            type: 'POST',
            dataType: 'json',
            data: {
                nombre : nombre 
                    }

            
        }).done(function(data)
        {

            $("#nombre").val("");

            $('#tabla tbody:first').before('<tr><td class=dato>' + nombre + '</td><td>' +

            '<form method=GET action=http://localhost:8000/borrar/proyecto/'+data.id +">"

            + "<button class='btn btn-danger' type='submit'>Eliminar</button><a href=http://localhost:8000/proyectos/"+data.id+"/edit class='btn btn-primary'>Editar</a>" +
            
            "</form>");

        });

        

    

}