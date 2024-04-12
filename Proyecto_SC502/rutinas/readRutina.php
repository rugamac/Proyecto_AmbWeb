<?php

include '../DAL/conexion.php';

    if(isset($_POST['id'])){

    $id=$_POST['id'];     
    $readSQL = "SELECT * FROM rutina where id_usuario = $id";


    $resultado = Conecta()->query($readSQL);    //ejecutar insert en sql
    
    if(!$resultado){    //si no hay resultado, consulta fallida
        die('Consulta fallida' . mysqli_error($conexion));
    }

    //en este caso se guardan los objetos en un array JSON para despues
    //ser consultado con GET de AJAX en FRONTEND
    $json = array();
    while($row=mysqli_fetch_array($resultado)){ //fila por cada dato de DB
        $json[] = array(
            'idRutina' => $row['id_rutina'],
            'name' => $row['nombre_rutina'],
            'day' => $row['dia_rutina'],
            'idUser' => $row['id_usuario']
            
          );
        }
        $jsonString = json_encode($json); //decodifica Json (de json a string nuevamente)
        echo $jsonString;
    }

?>