$(document).ready(function () {
    //al hacer cualquier accion de CRUD, recargar listado actualizado
    ListadoRutina();

    //CRUD AGREGAR
    $('#formAddRutina').submit(e => {//selecciona elemento con ID='rutinaform' y capturar su evento submit
        e.preventDefault();//cancelar el comportamiento default de un form (evita refrescar la pagina)
        const postData = { //crear objeto que almacena los input - guardar datos de texfield en variable
            idUser: $('#idUsuario').val(),
            name: $('#tipoRutina').val(), //obtener valor del campo con el id (name)
            day: $('#diaRutina').val(),
        };
        console.log(postData);

        if ($('#tipoRutina').val().trim() !== '' && $('#diaRutina').val().trim() !== '') {//verifica que los campos no esten vacios (trim() elimina espacios en blanco)

            $.post('../rutinas/insertRutina.php', postData, function (respuesta) { //direccion a enviar a backend de agregar, objeto, funcion
                ListadoRutina();
                console.log(respuesta);
                $('#formAddRutina').trigger('reset');   //al enviar datos, limpiar campos de texto
            });

        } else {
            alert('Campos vacios');
        }

    });

    //CRUD LISTADO Y FUNCION()

    function ListadoRutina() {
        $.ajax({
            url: '../rutinas/readRutina.php',
            type: 'GET',            //get porque es solo extraer informacion
            success: function (respuesta) {
                let rutina = JSON.parse(respuesta);
                let plantilla = '';
                rutina.forEach(rutina => {
                    plantilla += `
                        <tr>
                        <td>${rutina.idRutina}</td>
                        <td>${rutina.name}</td>
                        <td>${rutina.day}</td>
                        <td>
                            <a href="../ejercicios/ejercicios.php?id=${rutina.idRutina}"><button class="btn btn-success btn-lg"><i
                                        class="fa-solid fa-dumbbell ms-2 me-3"></i>Ejercicios</button></a>
                            <a class="btn btn-warning btn-lg px-4"
                                href="#">Editar Rutina</a>
                            <form method="POST">
                                <button class="rutina-eliminar btn btn-danger btn-lg px-4" onclick="#"
                                    name="btnEliminarRutina" value="${rutina.idRutina}">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                        `
                });
                $('#listadoRutinas').html(plantilla);    //en tbody identificado con id se le inserta el html credo con la platilla de arriba hecho con JS
            }
        });
    }
    //1:43:0 min
    $(document).on('click', '.rutina-eliminar', (e) => {
        if (confirm('Segur@ que desea borrar la rutina?')) {
            console.log('lofei');
            const elemento = $(this)[0].activeElement.parentElement;
            const idRutina = $(elemento).attr('rutinaEliminar');
            console.log(idRutina);
            //$.post('../rutinas/deleteRutina.php', { idRutina }, (respuesta) => {
                ListadoRutina();//recargar listado
            //});
        }
    });















});