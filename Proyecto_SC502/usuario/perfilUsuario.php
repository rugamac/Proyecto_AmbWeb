<?php
session_start();

//verificar si se accedio con login
if(empty($_SESSION['usuario'])){ //si no hay una sesion usuario
    header("location: usuario/vistaLogin.php");//devolver al login
} 
$id=$_GET['id'];//se puede usar el id desde session pero por ahora se queda asi-
include "../DAL/conexion.php";
//include "../templates/modal.php";
$sql=conecta()->query("select * from detalles_usuario where id_usuario=$id");
$sqlU=conecta()->query("select id_usuario, nombre, primer_apellido, segundo_apellido from usuario where id_usuario=$id");
$sqlR = Conecta()->query("select id_rutina, nombre_rutina, dia_rutina from rutina where id_usuario=$id");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>usuario</title>
    <link href="../css/bootstrap.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Krub:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;1,200;1,300;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet">
</head>

<body>
<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Logo</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="collapsibleNavbar">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="editarDatosUsuario.php?">editar informacion </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../rutinas/rutinas.php?">rutinas</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../checkin/check-in.php?">Check-In</a>
        </li>  
    </ul>
  </div>
</nav>
    <!-- mostrar datos tecnicos -->
    <?php
    $datosU = $sqlU -> fetch_object();
    while ($datos = $sql -> fetch_object()) { ?>

    <div class="container mt-3">
        <div class="mt-4 p-5 bg-dark text-white">
            <h1 class="text-center text-success">
                <?= $datosU->nombre . " " . $datosU->primer_apellido . " " . $datosU->segundo_apellido?></h1><br>
        </div>
    </div>
    <div class="container mt-2 container-fluid">
        <div class="mt-4 p-5 bg-dark">
            <div class="row justify-content-center">
                <!-- columna -->

                <div class="col-sm-5 mb-5">
                    <h2 class="display-6 text-success">Altura: </h2>
                    <h2 class="display-6 text-white"><?= $datos->altura_persona ?> m</h2>
                </div>

                <div class="col-sm-5 mb-5">
                    <h2 class="display-6 text-success">Peso: </h2>
                    <h2 class="display-6 text-white"><?= $datos->peso_persona ?> Kg</h2>
                </div>

                <div class="col-sm-5 mb-5">
                    <h2 class="display-6 text-success">Lesiones: </h2>
                    <h2 class="display-6 text-white"><?= $datos->lesiones ?></h2>
                </div>


                <div class="col-sm-5 mb-5">
                    <h2 class="display-6 text-success">Medicamentos: </h2>
                    <h2 class="display-6 text-white"><?= $datos->medicamentos ?></h2>
                </div>

            </div>
            <div class="row justify-content-center">
                <!-- columna  -->

                <div class="col-sm-5 mb-5">
                    <h2 class="display-6 text-success">Embarazo: </h2>
                    <h2 class="display-6 text-white"><?= $datos->embarazo ?></h2>
                </div>

                <div class="col-sm-5 mb-5">
                    <h2 class="display-6 text-success">Cirugia: </h2>
                    <h2 class="display-6 text-white"><?= $datos->cirugia ?></h2>
                </div>

                <div class="col-sm-5 mb-5">
                    <h2 class="display-6 text-success">Objetivo: </h2>
                    <h2 class="display-6 text-white"><?= $datos->objetivos ?></h2>
                </div>

                <div class="col-sm-5 mb-5">
                    <h2 class="display-6 text-success">Edad: </h2>
                    <?= include "../DAL/usuario.php";?>
                    <h2 class="display-6 text-white"><?= $datos = edad($datos->fecha_nacimiento); ?> años</h2>
                </div>

            </div>


        </div>

    </div>

    <?php }?>
    <!--Boton editar datos-->
    <div class="mt-4 py-5">
        <a href="editarDatosUsuario.php?id=<?= $datosU->id_usuario ?>" class="btn btn-outline-success btn-lg">Editar
            Informacion</a>
    </div>
    <div class="mt-4 py-5">
        <a href="../rutinas/rutinas.php?id=<?= $datosU->id_usuario ?>"
            class="btn btn-outline-success btn-lg">Rutinas</a>
    </div>
    <div class="mt-4 py-5">
        <a href="../checkin/check-in.php?id=<?= $id ?>"
            class="btn btn-outline-success btn-lg">Check-In</a>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <?php
// footer
include "../templates/footer.php";
?>
</body>

</html>