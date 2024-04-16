<?php 
session_start();

//verificar si se accedio con login
if(empty($_SESSION['usuario'])){ //si no hay una sesion usuario
    header("location: usuario/vistaLogin.php");//devolver al login
}

include "../DAL/conexion.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <title>Editar Informacion</title>
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
    <script src="..\js\jquery-3.7.1.min.js"></script>
    <!--  -->
    <!-- //recorrer todos los datos de la tabla. -->

    <div class="container mt-3">
        <div class="mt-4 p-5 bg-dark text-white">
            <h1 class="text-center text-success">
                <?= $_SESSION['nombre'] . " " . $_SESSION['apellido1'] . " " . $_SESSION['apellido2']?></h1><br>
        </div>
    </div>

    </div>
    <div class="container mt-3 container-fluid m-auto">
        <div class="mt-4 p-5 bg-dark">
            <form method="POST" id="postInsertDetalles">
                <div class="row justify-content-center m-auto">
                    <!-- columna -->

                    <div class="col-sm-5 mb-5">
                        <h3 class="text-success">Altura: </h3>
                        <input type="text" class="form-control" name="altura">
                    </div>

                    <div class="col-sm-5 mb-5">
                        <h3 class=" text-success">Peso: </h3>
                        <input type="text" class="form-control" name="peso" >
                    </div>

                    <div class="col-sm-5 mb-5">
                        <h3 class=" text-success">Lesiones: </h3>
                        <input type="text" class="form-control" name="lesiones" >
                    </div>

                    <div class="col-sm-5 mb-5">
                        <h3 class=" text-success">Medicamentos: </h3>
                        <input type="text" class="form-control" name="medicamentos">
                    </div>
                </div>

                <div class="row justify-content-center m-auto">
                    <!-- columna  -->

                    <div class="col-sm-5 mb-5">
                        <h3 class=" text-success">Embarazo: </h3>
                        <input type="text" class="form-control" name="embarazo" >
                    </div>

                    <div class="col-sm-5 mb-5">
                        <h3 class=" text-success">Cirugia: </h3>
                        <input type="text" class="form-control" name="cirugia" >
                    </div>

                    <div class="col-sm-5 mb-5">
                        <h3 class=" text-success">Objetivo: </h3>
                        <input type="text" class="form-control" name="objetivos">
                    </div>

                    <div class="col-sm-5 mb-5">
                        <h3 class=" text-success">Fecha nacimiento: </h3>
                        <input type="date" class="form-control" name="edad" >
                    </div>

                </div>

                <div class="text-center mt-3"><br>
                    <button class="btn btn-success py-2 px-4 btn-lg" name="btnAgregarDatos" value="ok" href="../index.php">Guardar</button>
                </div>
            </form>
            <?php //
        include "../DAL/usuario.php";
        

        ?>
        </div>
    </div>
    <script src="../js/loginJS.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>