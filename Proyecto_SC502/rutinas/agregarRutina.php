<?php
    include '../DAL/conexion.php';
    // EDITAR RUTINA (remplaza datos)
    //echo $_POST['idUser'];
    $name= $_POST['name'];
    $day= $_POST['day'];
    $id= $_POST['id'];


    $update = "UPDATE rutina SET nombre_rutina = '$name', dia_rutina = '$day' WHERE id_rutina = '$id'";
    $resultado = Conecta()->query($update);//ejecutar delete en sql
    
        if (!$resultado) {
        die('Consulta fallida');
        }
        echo "Rutina actualizada";  
    








?>