<?php

$servidor = "localhost";
$usuario = "root";
$clave = "";
$bd = "loogic";

$conexion = new mysqli($servidor, $usuario, $clave, $bd);

$consulta = "SELECT estado FROM tareas WHERE id = $_GET[id]";

$result = $conexion->query($consulta);

while($row = $result->fetch_assoc())
{
    if($row["estado"] == 0)
    {
        $sql = "UPDATE tareas SET estado='1' WHERE id=$_GET[id]";

    }
    else
    {
        $sql = "UPDATE tareas SET estado='0' WHERE id=$_GET[id]";

    }
}

if ($conexion->query($sql) === TRUE) 
{

}

?>