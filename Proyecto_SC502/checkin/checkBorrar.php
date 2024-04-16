<?php

include '../DAL/conexion.php';

// INICIO ELIMINAR FOTO ===========================================================================================

    if(isset($_POST['idFoto'])) {
        ECHO 'PHP: ';
        $idFoto = $_POST['idFoto'];
        
        //borrar de storage

        $rutaFoto=$_POST["rutaFoto"];

        if (file_exists($rutaFoto)) {
            // eliminar archivo del storage
            unlink($rutaFoto);
        }

        //borrar desde base de datos
        $sqlDeleteR="DELETE FROM fotos WHERE id_foto = $idFoto"; 
        $resultado = Conecta()->query($sqlDeleteR);//ejecutar delete en sql

        if (!$resultado) {
        die('Consulta fallida');
        }
        echo " eliminada exitosamente";  



    }

// FIN ELIMINAR FOTO ===========================================================================================

?>