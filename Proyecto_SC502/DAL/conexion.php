<?php

function Conecta() {
    $server = "localhost";
    $user = "root";
    $password = "";
    $database = "proyectoSQL";

    // 1. Establecer la conexión mysqli
    $conexion = mysqli_connect($server, $user, $password, $database);

    // 2. verficar que la conexion este correcta
    if(!$conexion){
        echo "Ocurrió un error al establecer la conexión " . mysqli_connect_error();
    }

    return $conexion;
}

function Desconectar($conexion) {
    mysqli_close($conexion);
}