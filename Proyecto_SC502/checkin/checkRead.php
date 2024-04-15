<?php

include '../DAL/conexion.php';

session_start();

//recibir solicitud para mostrar la lista de fotos en cada mes
if(isset($_POST['idUser'])){
    
    $id = $_POST['idUser'];
    $anno = $_POST['anno'];
    $mes = $_POST['mes'];

    $readSQL = "SELECT * FROM fotos where mes = '$mes' and anno = '$anno' and id_usuario = $id";
    
    $resultado = Conecta()->query($readSQL);

    
    
    if(!$resultado){    //si no hay resultado, consulta fallida
        die('Consulta fallida' . mysqli_error($conexion));
    }

    $json = array();
    while($row=mysqli_fetch_array($resultado)){ //fila por cada dato de DB
        $json[] = array(
            'id_foto' => $row['id_foto'],
            'mes' => $row['mes'],
            'ruta' => $row['ruta_foto'],
            'anno' => $row['anno'],
            'idUser' => $row['id_usuario'],
          );
        }
        $jsonString = json_encode($json); //decodifica Json (de json a string nuevamente)
        echo $jsonString;


}

// FIN LISTADO FOTO ===========================================================================================



?>