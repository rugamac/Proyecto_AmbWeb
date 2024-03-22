<?php

//verifica si hay contenido en los campos txt
if(!empty($_POST["btnRegistrar"])){
    if (!empty($_POST["nombre"]) and !empty($_POST["primerApellido"]) and !empty($_POST["segundoApellido"]) and !empty($_POST["correo"])){
        
        $nombre=$_POST["nombre"];
        $primerApellido=$_POST["primerApellido"];
        $segundoApellido=$_POST["segundoApellido"];
        $correo=$_POST["correo"];


        //este bloque aun tiene fallas - verifica si el correo ya se registro para evitar duplicados
        $verificarCorreo = "SELECT correo FROM usuario WHERE correo = '$correo'";
        $resultado = Conecta()->query($verificarCorreo);
        if(mysqli_num_rows($resultado)>0){
            echo '<div class="alert alert-warning text-center">Este correo ya está registrado</div>';
        }


        //intertar en la BD
        $sql=Conecta()->query("insert into usuario (nombre, primer_apellido, segundo_apellido, correo, tipo_suscripcion, fecha_creacion_cuenta, rol)
         values ('$nombre', '$primerApellido', '$segundoApellido', '$correo', 'ninguno', getDate(), 'user');");

        if($sql==1){//alertas de intertadi
            echo '<div class="alert alert-success">Usuario registrado</div>';
        }else{
            echo '<div class="alert alert-danger">Error al registrar</div>';
        }

    }else{//alerta si hay campos vacios
        echo '<div class="alert alert-warning text-center">Algunos de los campos están vacíos</div>';  
    }   
}


//para la contrasena ------------------------------------------------------------------------- sin terminar

if(!empty($_POST["btnRegistrar"])){
    if (!empty($_POST["password"])){
        
        $password=$_POST["password"];


        //
        $verificarCorreo = "SELECT correo FROM usuario WHERE correo = '$correo'";
        $resultado = Conecta()->query($verificarCorreo);
        if(mysqli_num_rows($resultado)>0){
            echo '<div class="alert alert-warning text-center">Este correo ya está registrado</div>';
            header("Location: crearUsuario.php");
        }


        //intertar en la BD
        $sql=Conecta()->query("insert into usuario (nombre, primer_apellido, segundo_apellido, correo) values ('$nombre', '$primerApellido', '$segundoApellido', '$correo')");

        if($sql==1){//alertas de intertadi
            echo '<div class="alert alert-success">Usuario registrado</div>';
        }else{
            echo '<div class="alert alert-danger">Error al registrar</div>';
        }

    }else{//alerta si hay campos vacios
        echo '<div class="alert alert-warning text-center">Campo contraseña vacio</div>';  
    }   
}
    
?>