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
    <link href="css/bootstrap.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Krub:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;1,200;1,300;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet">
</head>

<body>
    <!--SESSION-->
    <div class="text-white justify-content-between" id="headerP">

        <h3 class="col-6 mt-2 mx-3"><?php echo $_SESSION["usuario"];?></h3>
        <a href="usuario/cerrarSesion.php" class="btn btn-primary my-2 mx-3 px-3"><i
                class="fa-solid fa-right-from-bracket"></i></a>
    </div>
    <!-- listado clientes -->
    <label class="p-5"> </label>
    <div class="container-sm">
        <table class="table table-dark table-hover display-6 animation">
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
                include "DAL/conexion.php";
                    $adminId=$_SESSION['id'];
                if($_SESSION['rol']==='1'){
                    //para admin
                    $sql = conecta()->query("select id_usuario, nombre, primer_apellido, tipo_suscripcion from usuario where id_usuario!=$adminId");
                
                }else{
                    //para usuarios
                    $UserId =$_SESSION['id'];
                    $sql = conecta()->query("select id_usuario, nombre, primer_apellido, tipo_suscripcion from usuario where id_usuario = $UserId");
                }
                while($datos=$sql->fetch_object()){ 
                    $id_usuario=$datos->id_usuario;
                    $nombre= $datos->nombre;
                    $apellido= $datos->primer_apellido;
                    $suscripcion= $datos->tipo_suscripcion;
                     // Verificar el tipo de suscripción y mostrar etiquetas correspondientes-
                    if ($suscripcion === 'basico') {
                        $suscripcion = '<span class="badge bg-primary">Básico</span>';
                    } elseif ($suscripcion === 'plus') {
                        $suscripcion = '<span class="badge badge-plus ">Plus</span>';
                    } elseif($suscripcion === 'premium') {
                        $suscripcion = '<span class="badge badge-premium">PREMIUM</span>';
                    }
                    ?>
                <tr>
                    <td><?= $id_usuario?></td>
                    <td><?= $nombre ?></td>
                    <td><?= $apellido ?></td>
                    <td><?= $suscripcion ?></td>
                    <td>
                        <a href="usuario/perfilUsuario.php?id=<?= $datos->id_usuario ?>" class="btn btn-success"><i
                                class="fa-solid fa-dumbbell ms-2 me-3"></i>Perfil</a>
                        <a href="sistema/administracion.php?id=<?= $datos->id_usuario ?>" class="btn btn-warning"><i
                                class="fa-solid fa-desktop ms-2 me-3"></i>Sistema</a>
                    </td>
                </tr>
                <?php }
                ?>

            </tbody>
        </table>
    </div>
    </div>


    <script>
    document.addEventListener("DOMContentLoaded", function() {});
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>

    <?php
// footer
include "templates/footer.php";
?>
</body>

</html>