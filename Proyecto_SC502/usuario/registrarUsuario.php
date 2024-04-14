<?php
include "../DAL/conexion.php";
require_once "../include/functions/recoge.php";
session_start();
//verifica si hay contenido en los campos txt
if(isset($_POST["correo"])){
               

        $nombre=recogePost("nombre");
        $primerApellido=recogePost("apellido1");
        $segundoApellido=recogePost("apellido2");
        $correo=recogePost("correo");
        $password=recogePost("password");
        $password = md5($password); //encriptar contrasena


        //verifica si el correo ya se registro para evitar duplicados
        $verificarCorreo = "SELECT correo FROM usuario WHERE correo = '$correo'";
        $resultado = Conecta()->query($verificarCorreo);
        if(mysqli_num_rows($resultado)>0){
            echo 'Este correo ya está registrado';
            die();
        }

        //intertar en la BD ----------
        $sql=Conecta()->query("insert into usuario (nombre, primer_apellido, segundo_apellido, correo, tipo_suscripcion, id_rol, PASSWORD)
        values ('$nombre', '$primerApellido', '$segundoApellido', '$correo', 'ninguno', 2, '$password');");

        if($sql==1){//alertas de insert
            echo 'Usuario registrado';
        }else{
            echo 'Error al registrar';
        }

        $validacion = Conecta()->query("SELECT * FROM usuario WHERE correo = '$correo'");

            if($datos = $validacion->fetch_object()) {
                
                $_SESSION['usuario']=$datos->correo;//extrae el correo
                $_SESSION['id']=$datos->id_usuario;//extrae el id del usuario autenticado
                $_SESSION['rol']=$datos->id_rol;//extrae el rol
                $_SESSION['apellido1']=$datos->primer_apellido;
                $_SESSION['apellido2']=$datos->segundo_apellido;
                $_SESSION['nombre']=$datos->nombre;
            }
    }  


?>