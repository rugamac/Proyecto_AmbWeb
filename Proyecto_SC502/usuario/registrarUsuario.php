<?php
include "../DAL/conexion.php";
//verifica si hay contenido en los campos txt
if(isset($_POST["correo"])){
        
        

        $nombre=$_POST["nombre"];
        $primerApellido=$_POST["apellido1"];
        $segundoApellido=$_POST["apellido2"];
        $correo=$_POST["correo"];
        $password=$_POST["password"];
        $password = md5($password); //encriptar contrasena


        //verifica si el correo ya se registro para evitar duplicados
        $verificarCorreo = "SELECT correo FROM usuario WHERE correo = '$correo'";
        $resultado = Conecta()->query($verificarCorreo);
        if(mysqli_num_rows($resultado)>0){
            echo 'Este correo ya está registrado';
            die();
        }

        //intertar en la BD ----------
        $sql=Conecta()->query("insert into usuario (nombre, primer_apellido, segundo_apellido, correo, tipo_suscripcion, rol, PASSWORD)
        values ('$nombre', '$primerApellido', '$segundoApellido', '$correo', 'ninguno', 'user', '$password');");

        if($sql==1){//alertas de insert
            echo 'Usuario registrado';
        }else{
            echo 'Error al registrar';
        }



    }  


?>