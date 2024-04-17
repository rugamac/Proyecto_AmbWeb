<?php
include "../DAL/conexion.php";

if(isset($_POST['valor']) and isset($_POST['valor'])){

    $idUser=$_POST['idUser'];
    $valor=$_POST['valor'];


    $sql=Conecta()->query("UPDATE usuario SET tipo_suscripcion='$valor' where id_usuario=$idUser");

    echo 'Suscripcion cambiada';

}




?>