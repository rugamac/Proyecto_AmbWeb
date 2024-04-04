<?php
//verifica si hay contenido en los campos txt
echo '<div class="alert alert-warning text-center">fase 1</div>';

if(!empty("btnAgregarRutina")){

    echo '<div class="alert alert-warning text-center">fase 2</div>';

    if (!empty($_POST["tipoRutina"]) and !empty($_POST(["diaRutina"]))){ //arreglar

        echo '<div class="alert alert-warning text-center">fase 3</div>';

        $tipoRutina=$_POST["tipoRutina"];
        $diaRutina=$_POST["tipoRutina"];

        
        //insertar en BD
        $sqlInsertR=Conecta()->query("INSERT INTO rutina(nombre_rutina, dia_rutina,id_usuario)values('$tipoRutina','$diaRutina'$id);");

        echo '<div class="alert alert-warning text-center">fase 4</div>';

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