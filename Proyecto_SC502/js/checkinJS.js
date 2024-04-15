//seleccionar el radio marcado
document.querySelectorAll('input[name="mes"]').forEach((radio) => {
  radio.addEventListener("change", (event) => {
    const mesSeleccionado = event.target.value;//obtener valor del radio marcado
    $('#mesSeleccionado').val(mesSeleccionado);
  });
});
//LISTADO --------------------------------------------------------------------------------------

$(document).on('click', '#btnBuscar', function ListadoFotos() {
  idUser = $('#idUsuario').val();
  anno = $('#anno').val();
  mes = $('#mesSeleccionado').val();

  console.log(idUser);

  $.ajax({
    url: '../checkin/checkRead.php',
    type: 'POST',
    data: {
      idUser: idUser,
      anno: anno,
      mes: mes
    },
    success: function (respuesta) {
      let img = JSON.parse(respuesta);
      let plantilla = '';
      img.forEach(img => {
        plantilla += `
        <div class="card-header">
                        <h2>${img.mes} del ${img.anno}</h2>
                        <hr class="border-top border-dark opacity-25">
                        <h5>Nota:</h5>
                        <p><?php $nota?> buen progreso </p>
                    </div>
                    <div class="card-body" id="canvas-img">
                        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3">
                            <div class="col">
                                <img src="${img.ruta}" class="rounded img-fluid m-1">
                            </div>
                        </div>

                    </div>
        `
      });
      $('#header-card').html(plantilla);
    }
  });

  //----------------------------------------------------------------------------------------------

 



});
