<?php 
    function insertar_datos($nombre, $apellido, $dni, $carrera, $anio){
         global $conexion;
       $smt= "INSERT INTO alumno (nombre, apellido, dni, carrera, anio) VALUES ('$nombre','$apellido','$dni','$carrera','$anio')";
        $ejecutar = mysqli_query($conexion, $smt);
        return $ejecutar;
    }
?>