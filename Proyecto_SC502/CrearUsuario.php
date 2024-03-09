<!--Recibir id del usuario en ecpecifico-->
<?php 
include "DAL/conexion.php";
include "DAL/usuario.php";
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

    <title>Crear Cuenta</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>

<body>
    <!-- -->
    <div>
        <div class="container-sm mt-5 pt-5 border col-md-4 bg-dark align-items-center justify-content-center">

            <div class="col-lg-6 m-auto">
                <div class="card-body">
                    <form method="POST">
                        <h1 class="text-success text-center">Crear Usuario</h1>

                        <input type="text" name="nombre" class="form-control my-4 py-2" placeholder="Nombre" />

                        <input type="text" name="primerApellido" class="form-control my-4 py-2"
                            placeholder="Primer Apellido" />

                        <input type="text" name="segundoApellido" class="form-control my-4 py-2"
                            placeholder="Segundo Apellido" />

                        <input type="email" name="email" class="form-control my-4 py-2"
                            placeholder="Correo Electronico" />

                        <input type="password" name="password" class="form-control my-4 py-2"
                            placeholder="Contraseña" />

                        <div class="text-center mt-3"><br>
                            <button class="btn btn-success p-2">Registrarse</button>
                            <a href="login.php" class="nav-link text-primary my-3">Ya tengo una cuenta</a>
                        </div>

                    </form>
                </div>
            </div>

        </div>
    </div>






    <!-- -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>