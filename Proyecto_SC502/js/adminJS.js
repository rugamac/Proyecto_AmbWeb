//set valor de form segun lo seleccionado
document.querySelectorAll('input[name="sus"]').forEach((radio) => {

    $(document).on('click', '.btn-suscripcion', function cambioSus(e) {
        e.preventDefault();
        let idUser = $(this).data('id');//extrae la id del boton por persona
        const suscripcion = $(this).data('suscripcion');
        // preseleccionar el radio a la suscripción actual de la persona
        document.querySelector('input[name="sus"][value="' + suscripcion + '"]').checked = true;

        //cambiar suscripcion
        radio.addEventListener("change", (event) => {
            event.preventDefault();
            const selected = event.target.value;//obtener valor del radio marcado

            //enviar a backend para hacer cambio
            $.post('../sistema/cambioSuscripcion.php', { idUser: idUser, valor: selected }, function (respuesta) {
                console.log(respuesta);
            });

        });
    });

});

//recargar pagina al guardar
function recargar() {
    location.reload();
}

//AGREAGAR PAGOS
$(document).on('click', '.btn-pago', function AgregarPago() {
    let idUser = $(this).data('id');//extrae la id del boton por persona
    
    $('#formAddPago').submit(e => {
        e.preventDefault();

        if ($('#monto').val().trim() !== '' && $('#dia').val().trim() != '' && $('#estado').val().trim() != '') {
            
            const postData = {
                idUser: idUser,
                monto: $('#monto').val(), //obtener monto
                dia: $('#dia').val(), //obtener dia
                estado: $('#estado').val(),//obtener estado
            };
                $.post('../sistema/cambioSuscripcion.php', postData, function (respuesta) {
                    console.log(respuesta);
                    if(respuesta=='1'){
                        alert('Este usuario ya tiene una fecha asignada');
                    }
                    if(respuesta=='2'){
                        alert('Fecha de Pago asignado');
                    }
                });

        } else {
            alert("Campos Vacios");
        }
    });
});


// EDITAR PAGOS
/*
document.querySelectorAll('input[name="pago"]').forEach((radio) => {

    $(document).on('click', '.btn-pago', function cambioPago() {
        let idUser = $(this).data('id');//extrae la id del boton por persona

        radio.addEventListener("change", (event) => {
            event.preventDefault();
            const selected = event.target.value;//obtener valor del radio marcado

            const postData = { //crear objeto que almacena los input - guardar datos de texfield en variable
                idUser: $(IdUser),
                monto: $('#monto').val(), //obtener valor del campo con el id (name)
                dia: $('#dia').val(),
                valor: $('#selected').val(),
            };

            console.log(postData);

        });
    });
});

*/