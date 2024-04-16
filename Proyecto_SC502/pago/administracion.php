<?php
    session_start();

    //verificar si se accedio con login
    if(empty($_SESSION['usuario'])){ //si no hay una sesion usuario
        header("location: usuario/vistaLogin.php");//devolver al login
    }

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index</title>
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
    <!--SESSION-->
    <div class="text-white justify-content-between" id="headerP">

    </div>
    <!-- listado clientes -->
    <label class="p-5"> </label>
    <div class="container-sm">
        <table class="table table-dark table-hover display-6">
            <thead class="table-dark">
                <tr>
                    <th scope="col" class="text-success opac">Id</th>
                    <th scope="col" class="text-success">Nombre</th>
                    <th scope="col" class="text-success">Apellido</th>
                    <th scope="col" class="text-success">Suscripcion</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                <?php
                include "../DAL/conexion.php";
                    $adminId=$_SESSION['id'];
                if($_SESSION['rol']==='1'){
                    //para admin
                    $sql = conecta()->query("select id_usuario, nombre, primer_apellido, tipo_suscripcion from usuario where id_usuario!=$adminId");
                
                }else{
                    //para usuarios
                    $UserId =$_SESSION['id'];
                    $sql = conecta()->query("select id_usuario, nombre, primer_apellido, tipo_suscripcion from usuario where id_usuario = $UserId");
                }
                while($datos=$sql->fetch_object()){ ?>
                <tr>
                    <td><?= $datos->id_usuario ?></td>
                    <td><?= $datos->nombre ?></td>
                    <td><?= $datos->primer_apellido ?></td>
                    <td><?= $datos->tipo_suscripcion ?></td>
                    <td>
                        <button href="usuario/perfilUsuario.php?id=<?= $datos->id_usuario ?>"
                            class="btn btn-success btn-lg">Suscripciones</button>
                        <!--dropdown dentro de un modal para cambiar suscripcion (admin)
                            vista de tarjetas de suscripcion, que redirige a metodos de pagos (user)-->
                        <button href="usuario/perfilUsuario.php?id=<?= $datos->id_usuario ?>"
                            class="btn btn-success btn-lg">Pago</button>
                        <!--cambiar fecha de pago con input string, dia del mes con modal.(boton editar solo lo ve admin)
                            el usuario ve estos datos en la vista de perfil usuario-->

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

    <?php
// footer
include "../templates/footer.php";
?>
</body>

</html>