<?php
include '../DAL/conexion.php';
// Eliminar ejercicio

    if(isset($_POST['idEjercicio'])) {
        ECHO 'PHP: ';
        $id = $_POST['idEjercicio'];
        echo 'eliminar ejercicio con ID: '.$id;
        $sqlDeleteE="DELETE FROM ejercicio WHERE id_ejercicio = $id"; 
        $resultado = Conecta()->query($sqlDeleteE);//ejecutar delete en sql
    
        if (!$resultado) {
        die('Consulta fallida');
        }
        echo " Eliminado exitosamente";  
    
    }


?>