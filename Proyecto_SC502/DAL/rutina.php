<?php

require_once "DAL/conexion.php";
//verifica si hay contenido en los campos txt
if(!empty("btnAgregarRutina")){
    if (!empty($_POST["tipoRutina"]) and !empty($_POST(["diaRutina"]))){

        $tipoRutina=$_POST["tipoRutina"];
        $diaRutina=$_POST["diaRutina"];

        //insertar en BD
        $sqlInsertR=Conecta()->query("INSERT INTO rutina(nombre_rutina, dia_rutina,id_usuario)
        values('$tipoRutina','$diaRutina'$id);");

    if($sqlInsertR==1){//alertas de insert
        echo '<div class="alert alert-success">Rutina creada</div>';
    }else{
        echo '<div class="alert alert-danger">Error al crear rutina</div>';
    }

    }else{

        echo '<div class="alert alert-warning text-center">Campos vacíos</div>';
    }

}












?>