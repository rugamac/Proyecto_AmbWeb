<?php 
session_start();

//verificar si se accedio con login
if(empty($_SESSION['usuario'])){ //si no hay una sesion usuario
    header("location: usuario/vistaLogin.php");//devolver al login
} 
$idRutina=$_GET["id"];
include "../DAL/conexion.php";
$sqlE = Conecta()->query("select * from ejercicio where id_rutina=$idRutina");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Krub:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;1,200;1,300;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="../css/style.css">
    <title>usuario</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <script src="..\js\jquery-3.7.1.min.js"></script>


    <!-- Detalle de la rutina y mostrar sus ejercicios -->
    <input type="hidden" value="<?php echo $_SESSION['rol'];?>" id="Rol" />
    <!-- izquierda ---------------------------------------------------------------------------------------------->

    <div class="container-fluid">
        <div class="row content">
            <div class="col-sm-4 sidenav mt-5">
                <form method="POST" id="formAddEjercicio">

                    <input type="hidden" id="idEjercicio">

                    <input type="hidden" id="idRutina" value="<?=$idRutina?>">

                    <input type="text" id="nombreEjercicio" class="form-control mt-4 py-2"
                        placeholder="Nombre de Ejercicio" />

                    <input type="text" id="setsEjercicio" class="form-control mt-4 py-2" placeholder="Sets" />

                    <input type="text" id="maquinaEjercicio" class="form-control mt-4 py-2" placeholder="Maquina" />

                    <input type="text" id="observacionesEjercicio" class="form-control mt-4 py-2"
                        placeholder="Observaciones" />

                    <?php
                if($_SESSION['rol']=="1"){
                    echo "<div class='text-center mt-3'><br>
                    <button class='btn btn-success btn-lg p-1 px-4' name='btnRegistrar' value='ok'>Guardar</button>
                </div>";
                    }?>

                </form>

            </div>
            <!-- Derecha --------------------------------------------------------------------------->

            <div class="col-sm-8">
                <h4 class="text-success display-4"><small>Lista de Ejercicios</small></h4>
                <hr>
                <div class="table-responsive container-sm mt-5">
                    <table class="table table-bordered table-dark table-striped table-hover display-6">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th scope="col" class="text-success">Ejercicio</th>
                                <th scope="col" class="text-success">Sets</th>
                                <th scope="col" class="text-success">Maquina</th>
                                <th scope="col" class="text-success">Observaciones</th>
                                <th> </th>

                            </tr>
                        </thead>
                        <tbody id="listadoEjercicios"></tbody>
                    </table>
                </div>
            </div>
        </div>
    </div><br>




    <script src="../js/ejercicioJS.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>

<?php
// footer
include "../templates/footer.php";
?>