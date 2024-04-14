$(document).ready(function () {
    //al hacer cualquier accion de CRUD, recargar listado actualizado
    ListadoEjercicio();

    let editar = false;//edicion desactivada

    //CRUD AGREGAR --
    $('#formAddEjercicio').submit(e => {//selecciona elemento con ID='Ejercicioform' y capturar su evento submit
        e.preventDefault();//cancelar el comportamiento default de un form (evita refrescar la pagina)
        const postData = { //crear objeto que almacena los input - guardar datos de texfield en variable
            nombre: $('#nombreEjercicio').val(), //obtener valor del campo con el id (name)
            sets: $('#setsEjercicio').val(),
            maquina: $('#maquinaEjercicio').val(),
            observaciones: $('#observacionesEjercicio').val(),
            idRutina: $('#idRutina').val(),//foreign key
            idEjercicio: $('#idEjercicio').val(),
        };

        //si el modo edicion esta desactivado se agrega nuevos objetos ---------------------------------------------------------
        //si esta activado se modifican objetos en lugar de agregar nuevos
        let url = editar === false ? '../ejercicio/insertEjercicio.php' : '../ejercicio/agregarEjercicio.php';
        console.log(postData, url);

        if ($('#nombreEjercicio').val().trim() !== '' && $('#setsEjercicio').val().trim() !== '' && $('#maquinaEjercicio').val().trim() !== '') {//verifica que los campos no esten vacios (trim() elimina espacios en blanco)
            $.post(url, postData, function (respuesta) { //direccion a enviar a backend de agregar, objeto, funcion
                ListadoEjercicio();
                console.log(respuesta);
                $('#formAddEjercicio').trigger('reset');   //al enviar datos, limpiar campos de texto
                editar = false;    //desactivar modo edicion
            });
        } else {
            alert('Campos vacios');
        }

    });

    //CRUD LISTADO Y FUNCION()

    function ListadoEjercicio() {
        let = idRutina = $('#idRutina').val();
        $.ajax({
            url: '../ejercicio/readEjercicio.php',
            type: 'POST',
            data: { id: idRutina },
            success: function (respuesta) {
                let Ejercicio = JSON.parse(respuesta); //meter JSON en variable
                let plantilla = ''; //declaracion de plantilla vacio, para admin
                let plantillaUser = ''; //declaracion de plantilla vacio, este no puede modificar o aliminar
                Ejercicio.forEach(Ejercicio => {
                    plantilla += `
                            <tr>
                                <td>${Ejercicio.idEjercicio}</td>
                                <td>${Ejercicio.nombre}</td>
                                <td>${Ejercicio.sets}</td>
                                <td>${Ejercicio.maquina}</td>
                                <td>${Ejercicio.observaciones}</td>
                                <td>
                                    <button value="${Ejercicio.idEjercicio}" class="updateEjercicio btn btn-warning btn-lg px-4">Editar</button><br>
                                    <button value="${Ejercicio.idEjercicio}" class="deleteEjercicio btn btn-danger btn-lg px-4">Eliminar</button>
                                </td>
                            </tr>
                            `
                    plantillaUser += `
                            <tr>
                                <td>${Ejercicio.idEjercicio}</td>
                                <td>${Ejercicio.nombre}</td>
                                <td>${Ejercicio.sets}</td>
                                <td>${Ejercicio.maquina}</td>
                                <td>${Ejercicio.observaciones}</td>
                                <td>
                                </td>
                            </tr>
                            `
                });
                let rol = $('#Rol').val();//extraer rol de input
                if (rol == 1) {//si tiene rol admin
                    $('#listadoEjercicios').html(plantilla);    //en tbody identificado con id se le inserta el html credo con la platilla de arriba hecho con JS
                }
                if(rol ==2){//para usuario
                    $('#listadoEjercicios').html(plantillaUser);
                }
            }
        });
    }

    //BORRAR Ejercicio
    $(document).on('click', '.deleteEjercicio', function () {
        if (confirm('Segur@ que desea borrar la Ejercicio?')) {
            let idEjercicio = $(this).val(); //obtiene id del objeto
            console.log(idEjercicio);
            $.post('../ejercicio/deleteEjercicio.php', { idEjercicio }, (respuesta) => {
                console.log(respuesta);
                ListadoEjercicio();//recargar listado
            });
        }
    });


    //EDITAR Ejercicio (consulta)
    $(document).on('click', '.updateEjercicio', function () {
        let idEjercicio = $(this).val(); //obtiene id del objeto
        console.log(idEjercicio);

        $.post('../ejercicio/updateEjercicio.php', { idEjercicio }, function (respuesta) {
            //Al recibir respuesta, convierte nuevamente a JSON
            const Ejercicio = JSON.parse(respuesta);
            //y esos datos se muestran en los textfield
            $('#nombreEjercicio').val(Ejercicio.nombre), //obtener valor del campo con el id (name)
                $('#setsEjercicio').val(Ejercicio.sets),
                $('#maquinaEjercicio').val(Ejercicio.maquina),
                $('#observacionesEjercicio').val(Ejercicio.observaciones),
                $('#idEjercicio').val(Ejercicio.idEjercicio),//foreign key
                editar = true;    //activar modo edicion
        });
        ListadoEjercicio();//recargar listado
    });


});