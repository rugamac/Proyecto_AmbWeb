$(document).ready(function () {
    //al hacer cualquier accion de CRUD, recargar listado actualizado
    ListadoRutina();

    let editar = false;//edicion desactivada

    //CRUD AGREGAR
    $('#formAddRutina').submit(e => {//selecciona elemento con ID='rutinaform' y capturar su evento submit
        e.preventDefault();//cancelar el comportamiento default de un form (evita refrescar la pagina)
        const postData = { //crear objeto que almacena los input - guardar datos de texfield en variable
            idUser: $('#idUsuario').val(),
            name: $('#tipoRutina').val(), //obtener valor del campo con el id (name)
            day: $('#diaRutina').val(),
            id: $('#idRutina').val(),
        };

        //si el modo edicion esta desactivado se agrega nuevos objetos ---------------------------------------------------------
        //si esta activado se modifican objetos en lugar de agregar nuevos
        let url = editar === false ? '../rutinas/insertRutina.php' : '../rutinas/agregarRutina.php';
        console.log(postData, url);

        if ($('#tipoRutina').val().trim() !== '' && $('#diaRutina').val().trim() !== '') {//verifica que los campos no esten vacios (trim() elimina espacios en blanco)
            $.post(url, postData, function (respuesta) { //direccion a enviar a backend de agregar, objeto, funcion
                ListadoRutina();
                console.log(respuesta);
                $('#formAddRutina').trigger('reset');   //al enviar datos, limpiar campos de texto
                editar = false;    //desactivar modo edicion
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
                            <a href="../ejercicios/ejercicios.php?id=${rutina.idRutina}"><button class="btn btn-success btn-lg"><i                                      class="fa-solid fa-dumbbell ms-2 me-3"></i>Ejercicios</button></a>
                            <button class="updateRutina btn btn-warning btn-lg px-4" value="${rutina.idRutina}">Editar Rutina</button>
                            <button class="deleteRutina btn btn-danger btn-lg" value="${rutina.idRutina}">Eliminar</button>
                        </td>
                    </tr>
                        `
                });
                $('#listadoRutinas').html(plantilla);    //en tbody identificado con id se le inserta el html credo con la platilla de arriba hecho con JS
            }
        });
    }

    //BORRAR RUTINA
    $(document).on('click', '.deleteRutina', function () {
        if (confirm('Segur@ que desea borrar la rutina?')) {
            let idRutina = $(this).val(); //obtiene id del objeto
            console.log(idRutina);
            $.post('../rutinas/deleteRutina.php', { idRutina }, (respuesta) => {
                console.log(respuesta);
                ListadoRutina();//recargar listado
            });
        }
    });


    //EDITAR RUTINA (consulta)
    $(document).on('click', '.updateRutina', function () {
        let idRutina = $(this).val(); //obtiene id del objeto
        console.log(idRutina);

        $.post('../rutinas/updateRutina.php', { idRutina }, function (respuesta) {
            //Al recibir respuesta, convierte nuevamente a JSON
            const rutina = JSON.parse(respuesta);
            //y esos datos se muestran en los textfield
            $('#tipoRutina').val(rutina.name);
            $('#diaRutina').val(rutina.day);
            $('#idRutina').val(idRutina);//se agrega el value en el input hidden de idRutina
            editar = true;    //activar modo edicion
        });
        ListadoRutina();//recargar listado
    });

    //EDITAR RUTINA (edicion de datos)
 

});