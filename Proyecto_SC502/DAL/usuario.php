<?php

require_once "conexion.php";

/*
function CrearUsuario($pNombre, $pPrimerApellido, $pSegundoApellido, $pCorreo) {
    $retorno = false;

    try {
        $oConexion = Conecta();

        // formato de datos utf8
        if(mysqli_set_charset($oConexion, "utf8")){
            $stmt = $oConexion->prepare("insert into Usuario (nombre, primer_apellido, segundo_apellido, ) values (?, ?, ?)");
            $stmt->bind_param("sss", $iNombre, $iPrimer_apellido, $iSegundo_apellido);

            // cambiar segun base de datos
            $iNombre = $pNombre;
            $iPrimer_apellido = $pPrimer_apellido;
            $iSegundo_apellido = $pSegundo_apellido;

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
*/

    if(!empty($_POST["btnRegistrar"])){

        if (!empty($_POST["nombre"]) and !empty($_POST["primerApellido"]) and !empty($_POST["segundoApellido"]) and !empty($_POST["email"])){
            
            $nombre=$_POST["nombre"];
            $primerApellido=$_POST["primerApellido"];
            $segundoApellido=$_POST["segundoApellido"];
            $email=$_POST["correo"];

            $sql=Conecta()->query("insert into usuario (nombre, primer_apellido, segundo_apellido, correo) values ('$nombre', '$primerApellido', '$segundoApellido', '$correo')");

            if($sql==1){
                echo '<div class="alert alert-success">Usuario registrado</div>';
            }else{
                echo '<div class="alert alert-danger">Error al registrar</div>';
            }

        }else{
            echo '<div class="alert alert-warning">Algunos de los campos esta vacio"</div>';
        }
    }


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

function edad($fecha_nacimiento) {

    // Convierte la fecha de nacimiento a DateTime
    $fecha_nacimiento_obj = new DateTime($fecha_nacimiento);

    // Calcular la diferencia entre la fecha de nacimiento y la fecha actual
    $diferencia = date_diff(new DateTime(), $fecha_nacimiento_obj);

    // Obtiene la edad
    $edad = $diferencia->y;

    return $edad;
}