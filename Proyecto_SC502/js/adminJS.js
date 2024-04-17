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
                $.post('../sistema/cambioSuscripcion.php', {idUser:idUser, valor: selected }, function (respuesta) {
                    console.log(respuesta);
                });

            });
        });

    });

    //recargar pagina al guardar
    function recargar(){
        location.reload();
    }