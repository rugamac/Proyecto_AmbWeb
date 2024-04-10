<?php
//AGREGAR RUTINA

include '../DAL/conexion.php';

if(isset($_POST['name'])){ //obtener el objeto enviado en JSON desde JS
    
    $idUser=$_POST['idUser']; //de la mima manera con descripcion
    $name = $_POST['name'];  //almacenar el parametro nombre en variable 
    $day=$_POST['day']; //de la mima manera con descripcion
    
    //verificar en consola
    ECHO 'PHP: ';
    ECHO 'Nombre recibido desde php: '.$name.' '; 
    ECHO ' Dia recibido desde php: '.$day.' '; 
    ECHO ' id usuario: '.$idUser;

    $insertSQL = "INSERT INTO rutina(nombre_rutina, dia_rutina, id_usuario) VALUES ('$name', '$day', $idUser)";

    $resultado = Conecta()->query($insertSQL);//ejecutar insert en sql

    if(!$resultado){ //si no me da resultado
        die('Insercion fallida');     //parar y mostrar mensaje
    }
    echo 'Rutina Agregada';

} 

?>