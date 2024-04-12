<?php
    include '../DAL/conexion.php';
    // EDITAR RUTINA (remplaza datos)
    //echo $_POST['idUser'];
    $nombre = $_POST['nombre']; 
    $sets=$_POST['sets']; 
    $maquina=$_POST['maquina'];
    $observaciones=$_POST['observaciones'];
    $idEjercicio=$_POST['idEjercicio']; //Foreign key


    $update = "UPDATE ejercicio SET
    nombre_Ejercicio = '$nombre',
    setsE = '$sets',
    maquina= '$maquina',
    observaciones = '$observaciones'
    WHERE id_ejercicio = '$idEjercicio'";
    $resultado = Conecta()->query($update);//ejecutar delete en sql
    
        if (!$resultado) {
        die('Consulta fallida');
        }
        echo "Rutina actualizada";  

?>