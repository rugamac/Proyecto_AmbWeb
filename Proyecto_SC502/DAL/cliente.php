<?php

require_once "conexion.php";

function IngresarEstudiante($pNombre, $pCorreo, $pTelefono) {
    $retorno = false;

    try {
        $oConexion = Conecta();

        // formato de datos utf8
        if(mysqli_set_charset($oConexion, "utf8")){
            $stmt = $oConexion->prepare("insert into estudiante (nombre, correo, telefono) values (?, ?, ?)");
            $stmt->bind_param("sss", $iNombre, $iCorreo, $iTelefono);

            // set parametros y luego ejecutar
            $iNombre = $pNombre;
            $iCorreo = $pCorreo;
            $iTelefono = $pTelefono;

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


function DefinirContrasena($pCorreo, $pPassword) {
    $retorno = false;

    try {
        $oConexion = Conecta();

        // formato de datos utf8
        if(mysqli_set_charset($oConexion, "utf8")){
            $stmt = $oConexion->prepare("update estudiante set password = ? where correo = ?");
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

function getArray($sql) {
    try {
        $oConexion = Conecta();

        // formato de datos utf8
        if(mysqli_set_charset($oConexion, "utf8")){

            if(!$result = mysqli_query($oConexion, $sql)) die();  //cancela la ejecución

            $retorno = array();

            while ($row = mysqli_fetch_array($result)) {
                $retorno[] = $row;
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

function getObject($sql) {
    try {
        $oConexion = Conecta();

        // formato de datos utf8
        if(mysqli_set_charset($oConexion, "utf8")){

            if(!$result = mysqli_query($oConexion, $sql)) die();  //cancela la ejecución

            $retorno = null;

            while ($row = mysqli_fetch_array($result)) {
                $retorno = $row;
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