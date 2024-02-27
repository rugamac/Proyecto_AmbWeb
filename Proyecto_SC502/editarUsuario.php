<?php
$login = false;
require_once "include/templates/headerCliente.php";
$errores = array();

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    require_once "include/functions/recoge.php";
    $id = recogeGet("id");

    require_once "DAL/usuario.php";
    //sanitización de la información en php.net
    $query = "select id, nombre, correo, telefono, password from usuario where id = '$id'"; //sujeto a inyección de código

    $mySession = getObject($query);

    if ($mySession != null) {
        $id = $mySession['id'];
        $nombre = $mySession['nombre'];
        $correo = $mySession['correo'];
        $telefono = $mySession['telefono'];
    } else {
        $errores[] = "Usuario no se puede editar porque no existe";
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    require_once "include/functions/recoge.php";
    $nombre = recogePost("nombre");
    $correo = recogePost("correo");
    $telefono = recogePost("telefono");

    //Investigar en PHP expresiones regulares

    $nombreOk = false;
    $correoOk = false;
    $telefonoOk = false;

    if ($nombre == "") {
        $errores[] = "No se digito el nombre de la persona";
    } else {
        $nombreOk = true;
    }
    if ($correo == "") {
        $errores[] = "No se digito el correo de la persona";
    } else {
        $correoOk = true;
    }
    if ($telefono == "") {
        $errores[] = "No se digito el teléfono de la persona";
    } else {
        $telefonoOk = true;
    }

    if ($nombreOk && $correoOk && $telefonoOk) {
        // echo "Ingresar datos a la base de datos";
        require_once "DAL/usaurio.php";
        if (IngresarUsuario($nombre, $correo, $telefono)) {
            // echo "Ingreso a base de datos correcto";
            header("Location: consulta-datos.php?ingreso=1");
        } else {
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
        <input type="text" name="id" value="<?= $id ?>" hidden>
        <div>
            <label for="nombre-completo">Nombre completo:</label>
            <input type="text" name="nombre" id="nombre-completo" placeholder="Digita tu nombre" value="<?= $nombre ?>">
        </div>
        <div>
            <label for="correo">Correo electrónico:</label>
            <input type="email" name="correo" id="correo" placeholder="Digita tu correo" value="<?= $correo ?>">
        </div>
        <div>
            <label for="telefono">Teléfono:</label>
            <input type="number" name="telefono" id="telefono" placeholder="Digita tu teléfono" value="<?= $telefono ?>">
        </div>

        <button type="submit">Procesar información</button>
    </form>
</main>

<?php
// include_once "include/templates/header.php";
include "include/templates/footer.php";
?>