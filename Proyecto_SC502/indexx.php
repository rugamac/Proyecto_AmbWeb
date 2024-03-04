<?php
// include_once "include/templates/header1.php";
// require "include/templates/header1.php";
require_once "include/templates/header.php";
?>

<main class="contenedor">
    <!-- novalidate -->
    <form action="procesar-formulario.php" method="post">

        <?php 
            
            require_once "include/templates/datosPersonales.php"; 
        
            //require_once "include/templates/intereses.php"; 
        ?>

        <button type="submit">Procesar información</button>
    </form>
</main>

<?php
// include_once "include/templates/header.php";
include "include/templates/footer.php";
?>