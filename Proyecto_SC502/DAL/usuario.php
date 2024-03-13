<?php

require_once "conexion.php";

function DefinirContrasena($pCorreo, $pPassword) { //aun no funcional
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


    if (!empty($_POST["btnActualizarDatos"])){
        //verifica si cada textfield tiene datos
        if(!empty($_POST["altura"]) and !empty($_POST["peso"]) and
        !empty($_POST["lesiones"]) and !empty($_POST["medicamentos"]) and
        !empty($_POST["embarazo"]) and !empty($_POST["cirugia"]) and
        !empty($_POST["objetivos"]) and !empty($_POST["edad"])){

            $id_detalle=$_POST["id_detalle"];
            $altura=$_POST["altura"];
            $peso=$_POST["peso"];
            $lesiones=$_POST["lesiones"];
            $medicamentos=$_POST["medicamentos"];
            $embarazo=$_POST["embarazo"];
            $cirugia=$_POST["cirugia"];
            $objetivos=$_POST["objetivos"];
            $edad=$_POST["edad"];

            //modifica datos
            $sql=Conecta()->query(" update detalles_usuario set 
            altura_persona='$altura',
            peso_persona='$peso',
            lesiones='$lesiones',
            medicamentos='$medicamentos',
            embarazo='$embarazo',
            cirugia='$cirugia',
            objetivos='$objetivos',
            fecha_nacimiento='$edad' where id_detalle=$id_detalle;");
            if($sql==1){//si se actualiza correctamente
                header("location: index.php"); //ir al index
            }else{
                echo '<div class="alert alert-warning text-center"> Error al actualizar datos </div>';
            }

        }else{
            echo '<div class="alert alert-warning text-center"> Campos vacios </div>';
        }
    }



?>