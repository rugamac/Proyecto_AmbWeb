$(document).ready(function () {

    //REGISTRO
    //obterner datos y enviar a backend
    $('#formAddUsuario').submit(e => {//selecciona elemento con ID='Usuarioform' y capturar su evento submit
        e.preventDefault();//cancelar el comportamiento default de un form (evita refrescar la pagina)
        let lenPassword = $('#password').val().length;//obtener cantidad de carateres
        if (lenPassword >= 8) {//verificar si la los caracteres son mas de 8
            if ($('#password').val() == $('#passwordConfirm').val()) {

                const postData = { //crear objeto que almacena los input - guardar datos de texfield en variable
                    nombre: $('#nombre').val(), //obtener valor del campo
                    apellido1: $('#primerApellido').val(),
                    apellido2: $('#segundoApellido').val(),
                    correo: $('#correo').val(),
                    password: $('#password').val(),
                };


                //verifica que los campos no esten vacios (trim() elimina espacios en blanco)
                if ($('#nombre').val().trim() !== '' &&
                    $('#primerApellido').val().trim() !== '' &&
                    $('#segundoApellido').val().trim() !== '' &&
                    $('#correo').val().trim() !== '' &&
                    $('#password').val().trim() !== '' &&
                    $('#passwordConfirm').val().trim() !== '') {
                    $.post('../usuario/registrarUsuario.php', postData, function (respuesta) { //direccion a enviar a backend de agregar, objeto, funcion
                        console.log(respuesta);

                    });
                } else {
                    alert('Campos vacios');
                }
            } else {
                alert('Las contraseñas no coinciden');
            }
        } else {
            alert('La constraseña debe tener al menos 8 caracteres');
        }

    });
    /*
        let carga = `<div class="spinner-border text-success"></div>`;//animacion
        //INICIO SESION
        $('#formLogin').submit(e => {
            e.preventDefault();
            const postDataL = { //crear objeto que almacena los input - guardar datos de texfield en variable
                correo: $('#correo').val(),
                password: $('#password').val(), //obtener valor del campo con el id (name)
            };
            if ($('#correo').val().trim() !== '' && $('#password').val().trim()) {
                $.post('../usuario/login.php', postDataL, function (respuesta) { //direccion a enviar a backend de agregar, objeto, funcion
                    if (respuesta === 'success') { // Suponiendo que el servidor envía 'success' si el inicio de sesión es exitoso
                        alert('Inicio sesion exitoso');
                        window.location.href = '../index.php?=';
                    $('#carga').html(carga);//ejecutar animacion carga
                    }else{
                        alert("Inicio sesion fallido");
                    }
                });
            }else{
                alert("Campos vacios");
            }
        });
    */
});