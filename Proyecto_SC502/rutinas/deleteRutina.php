<?php
include '../DAL/conexion.php';
// Eliminar RUTINA

    if(isset($_POST['idRutina'])) {
        ECHO 'PHP: ';
        $id = $_POST['idRutina'];
        echo 'eliminar Rutina con ID: '.$id;
        $sqlDeleteR="DELETE FROM rutina WHERE id_rutina = $id"; 
        $resultado = Conecta()->query($sqlDeleteR);//ejecutar delete en sql
    
        if (!$resultado) {
        die('Consulta fallida');
        }
        echo " eliminada exitosamente";  
    
    }


?>