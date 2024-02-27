<?php
$login = false;
require_once "include/templates/headerClientes.php";

// $errores[] = []; //erroneo
// $errores = [];
$errores = array();

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    require_once "include/functions/recoge.php";
    $nombre = recogePost("nombre");
    $correo = recogePost("correo");
    $telefono = recogePost("telefono");

    //Investigar en PHP expresiones regulares

    $nombreOk = false;
    $correoOk = false;
    $telefonoOk = false;

    if ($nombre == ""){
        $errores[] = "No se digito el nombre de la persona";
    }else{
        $nombreOk = true;
    }
    if ($correo == ""){
        $errores[] = "No se digito el correo de la persona";
    }else{
        $correoOk = true;
    }
    if ($telefono == ""){
        $errores[] = "No se digito el teléfono de la persona";
    }else{
        $telefonoOk = true;
    }

    if ($nombreOk && $correoOk && $telefonoOk){
        // echo "Ingresar datos a la base de datos";
        require_once "DAL/cliente.php";
        if(IngresarEstudiante($nombre, $correo, $telefono)){
            // echo "Ingreso a base de datos correcto";
            header("Location: consulta-datos.php?ingreso=1");
        }else{
            $errores[] = "Ocurrió un error al ingresar el dato a base de datos";
        }
    }
}


?>

<main class="contenedor">
    <!-- novalidate -->
    <ul>
    <?php
        foreach ($errores as $error) {
            echo "<li class='error'>$error</li>";
        }
    ?>
    </ul>
    <form method="post">

        <?php require_once "include/templates/datosPersonales.php"; ?>

        <button type="submit">Procesar información</button>
    </form>
</main>

<?php
// include_once "include/templates/header.php";
include "include/templates/footer.php";
?>