<?php
//include 'rutina.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Modal</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>

    <!-- -------------- Modal Agregar rutina----------------------->
    <div class="modal" id="modalAgregarRutina">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title text-success display-6">Agregar Rutina</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <!-- Modal body -->
                <div class="modal-body modal-fade">
                    <div class="col-m-5 sidenav mt-5">

                        <form method="POST">
                            <input type="text" name="tipoRutina" class="form-control mt-4 py-2"
                                placeholder="Tipo de Rutina" />
                            <div class="container mt-3">
                                <div class="dropdown">
                                    <button type="button" class="btn btn-primary dropdown-toggle"
                                        data-bs-toggle="dropdown" name="diaRutina">Dia</button>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" value="Lunes">Lunes</a></li>
                                        <li><a class="dropdown-item" value="Martes">Martes</a></li>
                                        <li><a class="dropdown-item" value="Miercoles">Miercoles</a>
                                        </li>
                                        <li><a class="dropdown-item" value="Jueves">Jueves</a></li>
                                        <li><a class="dropdown-item" value="Viernes">Viernes</a></li>
                                        <li><a class="dropdown-item" value="Sabado">Sabado</a></li>
                                        <li><a class="dropdown-item" value="Domingo">Domingo</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger btn-lg mt-0"
                                    data-bs-dismiss="modal">Cancelar</button>
                                <button type="button" class="btn btn-success btn-lg mt-0" data-bs-dismiss="modal"
                                    name="btnAgregarRutina" value="ok">Guardar</button>
                            </div>
                        </form>
                        <?php include_once '../DAL/rutina.php';?>
                    </div>
                </div>
                <!-- Modal footer -->

            </div>
        </div>
    </div>

    <!-- -------------- Modal Editar rutina----------------------->
    <div class="modal" id="modalEditarRutina">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title text-success display-6">Editar Rutina</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <!-- Modal body -->
                <div class="modal-body modal-fade">
                    <div class="col-m-5 sidenav mt-5">
                        <form method="POST">
                            <input type="text" name="Tipo" class="form-control mt-4 py-2"
                                placeholder="Tipo de Rutina" />
                            <div class="container mt-3">
                                <div class="dropdown">
                                    <button type="button" class="btn btn-primary dropdown-toggle"
                                        data-bs-toggle="dropdown"> Dia </button>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" value="Lunes">Lunes</a></li>
                                        <li><a class="dropdown-item" value="Martes">Martes</a></li>
                                        <li><a class="dropdown-item" value="Miercoles">Miercoles</a>
                                        </li>
                                        <li><a class="dropdown-item" value="Jueves">Jueves</a></li>
                                        <li><a class="dropdown-item" value="Viernes">Viernes</a></li>
                                        <li><a class="dropdown-item" value="Sabado">Sabado</a></li>
                                        <li><a class="dropdown-item" value="Domingo">Domingo</a></li>
                                    </ul>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger btn-lg mt-0" data-bs-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-success btn-lg mt-0" data-bs-dismiss="modal">Guardar</button>
                </div>
            </div>
        </div>
    </div>

    <!---------------- Modal Eliminar rutina ----------------------->
    <div class="modal" id="modalEliminarRutina">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title text-success display-6">Eliminar Rutina</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <!-- Modal body -->
                <div class="modal-body modal-fade">
                    <div class="col-m-5 sidenav mt-5">
                        <h2>Desea eliminar esta rutina?</h2><br>
                    </div>
                </div>
                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger btn-lg mt-0" data-bs-dismiss="modal">Eliminar</button>
                    <button type="button" class="btn btn-dark btn-lg mt-0" data-bs-dismiss="modal">Cancelar</button>
                </div>
            </div>
        </div>
    </div>






</body>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
    integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
    integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous">
</script>

</html>