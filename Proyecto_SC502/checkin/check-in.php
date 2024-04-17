<?php
session_start();

if(empty($_SESSION['usuario'])){
    header("location: usuario/vistaLogin.php");
} 

$rol=$_SESSION['rol'];

include "../DAL/conexion.php";

//para evitar problemas usuario usa id sesion y admin del post
if($rol==1){//para admin
    $id=$_GET['id'];
}
if($rol==2){//para usuario
    $id=$_SESSION['id'];
}



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Check-In</title>
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


    <div class="container-fluid just">
        <div class="row content">
            <div class="col-sm-2 sidenav mt-5">
                <form method="POST" id="formFotos">
                    <input type="hidden" id="idUsuario" value="<?= $id ?>">
                    <p>Ingresar año</p>
                    <input id="anno" class="form-control" placeholder="Ejemplo: 2024" /><br>
                    <p>Ingresar mes</p>
                    <div class="accordion" id="mesSeleccionado" value="">
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true"
                                    aria-controls="panelsStayOpen-collapseOne">
                                    Mes
                                </button>
                            </h2>
                            <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show" value="">
                                <div class="accordion-body">
                                    <div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="mes" id="enero"
                                                value="enero">
                                            <label class="form-check-label" for="enero">Enero</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="mes" id="febrero"
                                                value="febrero">
                                            <label class="form-check-label" for="febrero">Febrero</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="mes" id="marzo"
                                                value="marzo">
                                            <label class="form-check-label" for="marzo">Marzo</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="mes" id="abril"
                                                value="abril">
                                            <label class="form-check-label" for="abril">Abril</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="mes" id="mayo"
                                                value="mayo">
                                            <label class="form-check-label" for="mayo">Mayo</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="mes" id="junio"
                                                value="junio">
                                            <label class="form-check-label" for="junio">Junio</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="mes" id="julio"
                                                value="julio">
                                            <label class="form-check-label" for="julio">Julio</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="mes" id="agosto"
                                                value="agosto">
                                            <label class="form-check-label" for="agosto">Agosto</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="mes" id="septiembre"
                                                value="septiembre">
                                            <label class="form-check-label" for="septiembre">Septiembre</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="mes" id="octubre"
                                                value="octubre">
                                            <label class="form-check-label" for="octubre">Octubre</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="mes" id="noviembre"
                                                value="noviembre">
                                            <label class="form-check-label" for="noviembre">Noviembre</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="mes" id="diciembre"
                                                value="diciembre">
                                            <label class="form-check-label" for="diciembre">Diciembre</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr class="border-top border-success opacity-25">
                    <div class="text-start my-3">
                        <button id="btnBuscar" class="btn btn-success col me-1" type="button">Buscar</button>
                    </div>
                    <div class="text-start my-3">
                        <button class="btn btn-primary col me-1" type="button" data-bs-toggle="modal"
                            data-bs-target="#subirFoto">Subir</button>
                    </div>
                </form>
            </div>
            <!-- Derecha --------------------------------------------------------------------------->

            <!--fotos columna derecha (lsitado en JS) -->
            <div class="container mt-3 col 10">
                <div class="card text-center animation" id="header-card">
                </div>
            </div>

        </div>
    </div>

    <!-- The Modal -->
    <div class="modal" id="subirFoto">
        <div class="modal-dialog mb-5 animation">
            <div class="modal-content mb-5">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Modal Heading</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <div class="imgUpload">
                        <label for="input-file" id="drop-area">
                            <form action="check.php" method="POST" enctype="multipart/form-data">
                                <div id="img-view">
                                    <img src="../img/icoUpload.png">
                                    <p>Dar click aqui para subir foto</p>
                                    <span>subir foto desde la galeria</span>
                                    <input type="file" name="file" accept="img/*" id="input-file"
                                        style="display: none;">
                                    <button type="submit" id="upload" class="btn btn-primary rounded-pill"
                                        data-bs-dismiss="modal">Subir</button>
                                </div>
                            </form>
                        </label>
                    </div>
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>



</html>

<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
    integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js"
    integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
</script>
<script src="../js/checkinJS.js"></script>
<?php
// footer
include "../templates/footer.php";
?>
</body>

</html>