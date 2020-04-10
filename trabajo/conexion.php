<?php 
    $conexion = mysqli_connect("localhost", "root", "", "alumnos");
    if($conexion){
        echo "se realizo la conexion";
    }else{
        echo "no hay conexion";
    }
?>