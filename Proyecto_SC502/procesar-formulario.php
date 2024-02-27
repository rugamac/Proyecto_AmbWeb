<?php
require_once "include/templates/header.php";
require_once "include/functions/recoge.php";
?>

<main class="contendor">
    <h1>Datos del usuario</h1>

    <p>El nombre de la persona es: <?php echo $_POST['nombre']; ?></p>
    <p>El correo electrónico es: <?= recogePost('correo') ?></p>
    <p>El teléfono es: <?= $_POST['telefono'] ?></p>

    <p>Los intereses son: <?= var_dump($_POST['intereses']) ?></p>

    <h2>Recorrido de los intereses</h2>

    <ul>
        <?php
        foreach ($_POST['intereses'] as $value) {
            echo "<li>$value</li>";
        }
        ?>
    </ul>

</main>

<?php

function IngresoDatosArchivo($nombre, $correo, $telefono)
{
    try {
        $archivo = fopen('archivos/datos.txt', 'a'); //w sobrescribe el archivo, a append al contenido del archivo
        $datos = "$nombre,$correo,$telefono\n";
        fwrite($archivo, $datos);
    } catch (\Throwable $th) {
        echo $th;
        //Almacenamiento en bitacora con Apache
        //Inicializar variables
    } finally {
        //Cerrar conexiones o archivos abiertos
        fclose($archivo);
    }
}

function IngresoDatosInteresesArchivo($nombre, $correo, $telefono, $intereses)
{
    try {
        $archivo = fopen('archivos/datosIntereses.txt', 'a'); //w sobrescribe el archivo, a append al contenido del archivo
        
        $formatoIntereses = '[';
        foreach ($intereses as $value) {
            $formatoIntereses .= "$value;";
        }
        $formatoIntereses .= ']';
        
        $datos = "$nombre,$correo,$telefono,$formatoIntereses\n";
        fwrite($archivo, $datos);
    } catch (\Throwable $th) {
        echo $th;
        //Almacenamiento en bitacora con Apache
        //Inicializar variables
    } finally {
        //Cerrar conexiones o archivos abiertos
        fclose($archivo);
    }
}

function LecturaArchivo($nombreArchivo)
{
    try {
        $archivo = fopen($nombreArchivo, 'r'); //r lectura
        echo "<h2>Imprimir datos desde el archivo: $nombreArchivo</h2>";
        while (($linea = fgets($archivo)) != null) {
            $arregloValores = explode(',', $linea);
            echo '<ul>';
            foreach ($arregloValores as $value) {
                echo "<li>$value</li>";
            }
            echo '</ul>';

            echo "<h3>$linea</h3>";
        }
        
    } catch (\Throwable $th) {
        echo $th;
        //Almacenamiento en bitacora con Apache
        //Inicializar variables
    } finally {
        //Cerrar conexiones o archivos abiertos
        fclose($archivo);
    }
}

$nombreP = recogePost('nombre');
$correoP = recogePost('correo');
$telefonoP = recogePost('telefono');
$interesesP = recogePost('intereses');

IngresoDatosArchivo($nombreP, $correoP, $telefonoP);
IngresoDatosInteresesArchivo($nombreP, $correoP, $telefonoP, $interesesP);
LecturaArchivo("archivos/datos.txt");

include "include/templates/footer.php";
?>