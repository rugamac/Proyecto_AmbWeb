<?php
$login = true;
require_once "include/templates/headerClientes.php";
// $errores[] = []; //erroneo
// $errores = [];
$errores = array();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    require_once "include/functions/recoge.php";
    $correo = recogePost("correo");
    $password = recogePost("password");

    //Investigar en PHP expresiones regulares

    if ($correo == "") {
        $errores[] = "No se digito el correo de la persona";
    }
    if ($password == "") {
        $errores[] = "No se digito la contraseña de la persona";
    }

    if (empty($errores)) {
        // echo "Ingresar datos a la base de datos";
        require_once "DAL/cliente.php";
        //sanitización de la información en php.net
        $query = "select id, nombre, correo, telefono, password from cliente where correo = '$correo'"; //sujeto a inyección de código

        $mySession = getObject($query);

        if ($mySession != null) {
            $auth = password_verify($password, $mySession['password']);
            if ($auth) {
                session_start();
                $_SESSION['usuario'] = $mySession['correo'];
                $_SESSION['id'] = $mySession['id'];
                $_SESSION['login'] = $mySession['true'];
                header("Location: index.php");
            } else {
                $errores[] = "Contraseña incorrecta";
            }
        } else {
            $errores[] = "Usuario no existe";
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

        <div>
            <label for="correo">Correo electrónico:</label>
            <input type="email" name="correo" id="correo" placeholder="Digita tu correo">
        </div>
        <div>
            <label for="password">Digite su contraseña:</label>
            <input type="password" name="password" id="password" placeholder="Digite su contraseña">
        </div>

        <button type="submit">Ingresar a la aplicación</button>
    </form>
</main>

<?php
// include_once "include/templates/header.php";
include "include/templates/footer.php";
?>