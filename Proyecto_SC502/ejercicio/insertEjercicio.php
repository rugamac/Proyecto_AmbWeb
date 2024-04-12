<?php
//AGREGAR ejercicio

include '../DAL/conexion.php';

if(isset($_POST['nombre'])){ //verifica enviado en JSON desde JS
    
    $nombre = $_POST['nombre']; 
    $sets=$_POST['sets']; 
    $maquina=$_POST['maquina'];
    $observaciones=$_POST['observaciones'];
    $idRutina=$_POST['idRutina']; //Foreign key
    

    $insertSQL = "INSERT INTO ejercicio(nombre_ejercicio, setsE, maquina, observaciones, id_rutina) VALUES 
    ('$nombre', '$sets', '$maquina', '$observaciones', $idRutina)";

    $resultado = Conecta()->query($insertSQL);//ejecutar insert en sql

    if(!$resultado){ //si no me da resultado
        die('Insercion fallida');     //parar y mostrar mensaje
    }
    echo 'Ejercicio agregado';

} 

?>