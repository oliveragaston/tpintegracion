<?php 
    if(isset($_POST['enviar'])){
        require_once("conexion.php");
        require_once("funciones.php");
        $archivo = $_FILES["archivo"]["name"];
        $archivo_copiado = $_FILES["archivo"]["tmp_name"];
        $archivo_guardado = "copia_" .$archivo;
        
        echo   $archivo. "esta en la ruta" .$archivo_copiado;
        if(copy($archivo_copiado, $archivo_guardado)){
            echo "se copio la carpeta temporal en la carpeta de trabajo <br/>";
        } else{
            echo "hubo error <br/>";
        }
        if(file_exists( $archivo_guardado)){
            $abrir = fopen($archivo_guardado,"r");
            $rows = 0;
            while($datos=fgetcsv($abrir, 1000, ";")){
               $rows ++;
                    if($rows>1){
                        $resultado = insertar_datos($datos[0],$datos[1],$datos[2],$datos[3], $datos[4]);
                        if($resultado){
                            echo "se realizo la inseción <br/>";
                        }else{
                            echo "hay problemas <br/>";
                        }
                    }
            }
        }else{
            echo "no existe el archivo copiado <br/>";
        }
    }
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
    <div class="formulario">
        <form action="index.php" class="formularioincompleto" method="post" 
           enctype="multipart/form-data">
            <input type="file" name="archivo" class="form-control">
            <input type="submit" value="subir archivo" class="form-control" name="enviar">
            
        </form>
    </div>
</body>
</html>