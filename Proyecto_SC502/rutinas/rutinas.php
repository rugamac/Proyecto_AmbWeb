<?php 
$idUsuario=$_GET["id"];
include "../DAL/conexion.php";

$sqlR = Conecta()->query("select id_rutina, nombre_rutina, dia_rutina from rutina where id_usuario=$idUsuario");
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
    <title>Rutinas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>

<body>
    <script src="..\js\jquery-3.7.1.min.js"></script>
    <!--JQUERY LOCAL-->

<!-------------------- RUTINAS ------------------------>

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
            <tbody id="listadoRutinas"></tbody>

        </table>

        <!----    Boton agregar Rutinas    ---->
        <div class="container-sm container-fluid bg-dark pt-2 py-4 rounded px-4">
            <form method="POST" id="formAddRutina">
                <input type="hidden" id="idRutina">
                <input type="hidden" id="idUsuario" value="<?=$idUsuario?>">
                <!-- Para vincular con foreign key entre rutina y usuario-->
                <input type="text" id="tipoRutina" class="form-form-control-sm mt-4 py-2 rounded-3 border-0"
                    placeholder="Tipo de Rutina" />
                <input type="text" id="diaRutina" class="form-form-control-sm mt-4 py-2 rounded-3 border-0 mx-2"
                    placeholder="Dia" />
                <button id="agregarRutina" type="submit" class="btn btn-success btn-lg" value="ok">Guardar</button>
            </form>
        </div>


    </div>

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