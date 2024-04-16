<?php

    include '../DAL/conexion.php';

    session_start();

// INICIO SUBIR FOTO ===========================================================================================

    //extraer fecha actual en string -------------------------------------------------
    $fechaActual = date ('Y-m-d');//formato de fecha
    $anno = strftime('%Y', strtotime($fechaActual)); // Obtener el año
    $mes = strftime('%B', strtotime($fechaActual)); // Obtener el mes
    // Obtener el número de mes actual
    $numero_mes = date('n', strtotime($fechaActual));
    
    // Definir los nombres de los meses en español
    $meses_espanol = array(
        'enero', 'febrero', 'marzo', 'abril', 'mayo', 'junio', 'julio', 'agosto', 'septiembre', 'octubre', 'noviembre', 'diciembre'
    );
    // Obtener el número de mes actual
    $numero_mes = date('n', strtotime($fechaActual));

    // Obtener el nombre del mes en español segun el numero
    $mes = $meses_espanol[$numero_mes - 1]; 

    $idUsuario = $_SESSION['id']; 
    //--------------------------------------------------------------------------------


    if(isset($_FILES['file'])){//al recibir el post de la imagen

        $file = $_FILES['file'];//meterlo en la variable
        $nombreImagen = $file['name'];
        $tipoImagen = $file['type'];
        $size = $file['size'];

        //validar extension para imagen
        $extensiones = array("image/jpg","image/jpeg","image/png"); 

        

        if(!in_array($tipoImagen, $extensiones)){//si no es de la extension permitida
            header("Location: check-in.php");
        }

        if($size > 5*1024*1024){
            echo "El tamaño maximo permitido son 5MB";
            header("Location: check-in.php");
            die();
        }

        //crear directorio de imagenes subidas
        if(!is_dir("uploads")){//si no exite carpeta de subidas
            mkdir("uploads",0777);//crear carpeta
        }

        //mover archivo a la carpeta
        move_uploaded_file($file['tmp_name'], 'uploads/'.$nombreImagen);//guardar imagen subida en carpeta

        $rutaFoto= 'uploads/'.$nombreImagen;//ruta completa con formato

        $sqlMesValidacion=Conecta()->query("SELECT * FROM notaMes where id_usuario = $idUsuario");//evitar duplciados en meses
        if(mysqli_num_rows($sqlMesValidacion)>0){
            //notas del mes ya está registrado o creado
            $sqlFoto = Conecta()->query("INSERT INTO fotos (mes, anno, ruta_foto, id_usuario) VALUES ('$mes', '$anno', '$rutaFoto', $idUsuario);"); 
        }else{
            //notas del mes aun no creado / entonces se crea
            $sqlMes = Conecta()->query("INSERT INTO notaMes (nota_mensual, id_usuario) VALUES (null, $idUsuario);");
            $sqlFoto = Conecta()->query("INSERT INTO fotos (mes, anno, ruta_foto, id_usuario) VALUES ('$mes', '$anno', '$rutaFoto', $idUsuario);");
        }

        header("Location: check-in.php");
        exit;

    }else{
        header("Location: check-in.php");
    }

// FIN SUBIR FOTO ===========================================================================================
    

?>