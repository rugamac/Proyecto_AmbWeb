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

    <style>
    h1 {
        color: rgb(72, 72, 72);
    }
    </style>

    <link rel="stylesheet" href="css/style.css">
    <title>Index</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>

<body>

    <!-- listado clientes -->
    <label class="p-5"> </label>
    <div class="container-sm">
        <table class="table table-light table-hover display-6">
            <thead class="table-success">
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Apellido</th>
                    <th scope="col">Suscripcion</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                <?php
                include "DAL/conexion.php";
                $sql = conecta()->query("select id_usuario, nombre, primer_apellido, tipo_suscripcion from usuario");
                while($datos=$sql->fetch_object()){ ?>
                <tr>
                    <td><?= $datos->id_usuario ?></td>
                    <td><?= $datos->nombre ?></td>
                    <td><?= $datos->primer_apellido ?></td>
                    <td><?= $datos->tipo_suscripcion ?></td>
                    <td>
                        <a href="perfilUsuario.php?id=<?= $datos->id_usuario ?>" class="btn btn-success btn-lg"><i class="fa-solid fa-dumbbell"></i>Perfil</a>
                        <a href="" class="btn btn-warning btn-lg"><i class="fa-solid fa-desktop"></i>Sistema</a>
                    </td>
                </tr>
                <?php }
                ?>

            </tbody>
        </table>
    </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>