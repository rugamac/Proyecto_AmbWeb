<?php

    include "../DAL/conexion.php";

    require_once "../include/functions/recoge.php";

    session_start();

    if (!empty($_POST["btnIngresar"])) {
        if(!empty($_POST["correo"]) and !empty($_POST["password"])){

            $correo = recogePost('correo');
            $password = recogePost('password');
            $password = md5($password);
     
            $validacion = Conecta()->query("SELECT * FROM usuario WHERE correo = '$correo' AND PASSWORD = '$password'");

            if($datos = $validacion->fetch_object()) {//si se encuentra un resultado
                
                $_SESSION['usuario']=$datos->correo;//extrae el correo
                $_SESSION['id']=$datos->id_usuario;//extrae el id del usuario autenticado
                $_SESSION['rol']=$datos->id_rol;//extrae el rol
                echo "success";
                header("Location: ..\index.php");
            }else{
                echo "<script>alert(Acceso denegado)</script>";
                
            }

            }else{echo "<script>alert('Campos vacios')</script>";
            }
            


        }






?>