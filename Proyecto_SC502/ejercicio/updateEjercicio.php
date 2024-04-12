<?php
include '../DAL/conexion.php';
// EDITAR ejercicio

        $id=$_POST["idEjercicio"];

        $sqlUpdateE="SELECT * FROM ejercicio WHERE id_ejercicio=$id";
        $resultado = Conecta()->query($sqlUpdateE);//ejecutar update en sql

        //verificar errores
        if (!$resultado) {
            die('Actualizacion fallida');
        }
        
        //el resultado contiene el objeto consultado en sql
        $json = array(); //crear array JSON
        while($row = mysqli_fetch_array($resultado)) {//introduce cada dato del objeto en un objeto JSON
            $json[] = array(
                'idEjercicio' => $row['id_ejercicio'],
                'nombre' => $row['nombre_ejercicio'],
                'sets' => $row['setsE'],
                'maquina' => $row['maquina'],
                'observaciones' => $row['observaciones'],
                'idRutina' => $row['id_rutina']
              );
    }
    //Se convierte el objeto json a string y se envia a frontEnd.
    $jsonstring = json_encode($json[0]);
    echo $jsonstring;

?>