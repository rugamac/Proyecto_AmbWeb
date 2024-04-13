<?php

    

    include "../DAL/conexion.php";
    

    require_once "../include/functions/recoge.php";



    if (!empty($_POST["btnIngresar"])) {
        //echo "<script>alert('wuasaa');</script>";
        if(!empty($_POST["correo"]) and !empty($_POST["password"])){

            $correo = recogePost($_POST['correo']);
            $password = recogePost($_POST['password']);
            $password = md5($password);

            echo $correo;
            //echo $password;


            
            $validacion = Conecta()->query("SELECT * FROM usuario WHERE correo = '$correo' AND PASSWORD = '$password'");
            $id = Conecta()->query("SELECT id_usuario FROM usuario WHERE correo = '$correo'");

            if(mysqli_num_rows($validacion)> 0){//si se encuentra un resultado
                session_start();
                $_SESSION['user']=$correo;
                $_SESSION['id']=$id;
                echo "success";
                header("Location: /index.php");
                exit;
            }else{
                echo "fail";
                die();
            }


            }else{echo "Campos Vacios";}
            


        }






?>