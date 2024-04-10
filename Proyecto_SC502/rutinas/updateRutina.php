<?php
include '../DAL/conexion.php';
// EDITAR RUTINA

        $id=$_POST["idRutina"];

        $sqlUpdateR="SELECT * FROM rutina WHERE id_rutina=$id";
        $resultado = Conecta()->query($sqlUpdateR);//ejecutar update en sql

        //verificar errores
        if (!$resultado) {
            die('Actualizacion fallida');
        }
        
        //el resultado contiene el objeto consultado en sql
        $json = array(); //crear array JSON
        while($row = mysqli_fetch_array($resultado)) {//introduce cada dato del objeto en un objeto JSON
        $json[] = array(
        'id' => $row['id_rutina'],
        'name' => $row['nombre_rutina'],
        'day' => $row['dia_rutina']
        );
    }
    //Se convierte el objeto json a string y se envia a frontEnd.
    $jsonstring = json_encode($json[0]);
    echo $jsonstring;

?>