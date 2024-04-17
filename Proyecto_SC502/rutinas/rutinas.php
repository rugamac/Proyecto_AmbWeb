<?php 
session_start();

//verificar si se accedio con login
if(empty($_SESSION['usuario'])){ //si no hay una sesion usuario
    header("location: usuario/vistaLogin.php");//devolver al login
} 
$idUsuario=$_GET["id"];
include "../DAL/conexion.php";

$sqlR = Conecta()->query("select id_rutina, nombre_rutina, dia_rutina from rutina where id_usuario=$idUsuario");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Rutinas</title>
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
<?php include "../templates/header.php";?>
    <script src="..\js\jquery-3.7.1.min.js"></script>


    <!--JQUERY LOCAL-->

    <!-------------------- RUTINAS ------------------------>

    <input type="hidden" value="<?php echo $_SESSION['rol'];?>" id="Rol" />
    <div class="container-sm container-fluid">
        <div class="mt-5 p-4 bg-dark text-white">
            <h2 class="text-start text-success display-6">Rutinas</h2>
        </div>
        <table class="table table-dark table-hover display-6">
            <thead class="table-dark">
                <tr>
                    <th scope="col" class="text-success">Id</th>
                    <th scope="col" class="text-success">Tipo</th>
                    <th scope="col" class="text-success">Dia</th>
                    <th scope="col"></th>
                </tr>
            </thead>


            <!-- Se llama listado con plantilla hecha en JS -->
            <tbody id="listadoRutinas" class="animation"></tbody>

        </table>

        <!----    Boton agregar Rutinas    ---->
        <div class="container-sm container-fluid bg-dark pt-2 py-4 rounded px-4">
            <form method="POST" id="formAddRutina">

                <input type="hidden" id="idRutina">
                <input type="hidden" id="idUsuario" value="<?=$idUsuario?>">
                <!-- Para vincular con foreign key entre rutina y usuario-->
                <?php
                if($_SESSION['rol']=="1"){

                echo "<input type='text' id='tipoRutina' class='form-form-control-sm mt-4 py-2 rounded-3 border-0'
                    placeholder='Tipo de Rutina' />
                <input type='text' id='diaRutina' class='form-form-control-sm mt-4 py-2 rounded-3 border-0 mx-2'
                    placeholder='Dia' />
                    <button id='agregarRutina' type='submit' class='btn btn-success btn-lg' value='ok'>Guardar</button>";
                }

                ?>

            </form>

        </div>


    </div>
    <script>
    document.addEventListener("DOMContentLoaded", function() {});
    </script>
    <script src="../js/rutinaJS.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>


</html>

<?php
// footer
include "../templates/footer.php";
?>