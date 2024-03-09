<?php

require_once "conexion.php";

function DefinirContrasena($pCorreo, $pPassword) {
    $retorno = false;

    try {
        $oConexion = Conecta();

        // formato de datos utf8
        if(mysqli_set_charset($oConexion, "utf8")){
            $stmt = $oConexion->prepare("update Usuario set password = ? where correo = ?");
            $stmt->bind_param("ss", $iPassword, $iCorreo);

            // set parametros y luego ejecutar
            $iCorreo = $pCorreo;
            $iPassword = $pPassword;

            if ($stmt->execute()){
                $retorno = true;
            }
        }

    } catch (\Throwable $th) {
        //almacenar información en bitacora $th
        //throw $th;
        echo $th;
    }finally{
        Desconectar($oConexion);
    }

    return $retorno;
}

function edad($fecha_nacimiento) {

    // Convierte la fecha de nacimiento a DateTime
    $fecha_nacimiento_obj = new DateTime($fecha_nacimiento);

    // Calcular la diferencia entre la fecha de nacimiento y la fecha actual
    $diferencia = date_diff(new DateTime(), $fecha_nacimiento_obj);

    // Obtiene la edad
    $edad = $diferencia->y;

    return $edad;
}