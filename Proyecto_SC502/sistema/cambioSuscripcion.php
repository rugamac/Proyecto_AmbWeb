<?php
include "../DAL/conexion.php";

if(isset($_POST['idUser']) and isset($_POST['valor'])){

    $idUser=$_POST['idUser'];
    $valor=$_POST['valor'];


    $sql=Conecta()->query("UPDATE usuario SET tipo_suscripcion='$valor' where id_usuario=$idUser");

    echo 'Suscripcion cambiada';

}

if(isset($_POST['idUser']) and isset($_POST['dia']) and isset($_POST['estado'])){

    $idUser=$_POST['idUser'];
    $monto=$_POST['monto'];
    $dia=$_POST['dia'];
    $estado=$_POST['estado'];

    $verificar=Conecta()->query("SELECT * FROM pagos where id_usuario = $idUser");
    if ($verificar->num_rows > 0) {
        echo "1";
        die();
    }else{
        $insert=Conecta()->query("INSERT INTO pagos(monto,dia_pago,estado,id_usuario)VALUES($monto,'$dia','$estado',$idUser);");
        echo "2";
    }

}


?>