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
      console.log(img)
      if(img.length>0){
        let plantilla = '';
        img.forEach(img => {
          plantilla += `
          <div class="card-header animation">
                          <h2 class="text-success">${img.mes} del ${img.anno}</h2>
                          <hr class="border-top border-success opacity-50">
                          <h5>Nota:</h5>
                          <p><?php $nota?> buen progreso </p>
                      </div>
                      <input type="hidden" id="id_foto" value="${img.id_foto}">
                      <input type="hidden" id="ruta_foto" value="${img.ruta}">
                      <div class="card-body" id="canvas-img">
                          <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3">
                              <div class="col m-auto">
                                <div class="card img-fluid border-0">
                                  <img src="${img.ruta}" class="rounded img-fluid m-1 card-img-top animation" >
                                      <div class="card-img-overlay ">
                                        <button id="btnBorrarFoto" 
                                        class="btn btn-danger btn-sm justify-content-around animation"><i class="fa-solid fa-trash"></i></button>
                                      </div>
                                </div>
                              </div>
                          </div>

                      </div>
          `
        });
      
        $('#header-card').html(plantilla);
      }else{
        let plantillaSinResultado = '';
        plantillaSinResultado += `
        <div class="container mt-3">
          <div class="card border-0 m-auto" style="width:400px">
            <img class="card-img-top opacity-50" src="../img/noFound.png" alt="Card image" style="width:100%">
            <div class="card-body">
              <h2 class="card-title text-center">Sin resultados</h2>
              <p class="text-center">No hay fotos subidas en este mes</p>
            </div>
        </div>
        <br>`
        $('#header-card').html(plantillaSinResultado);
      }  
    }
  });

 

});

 //----------------------------------------------------------------------------------------------

$(document).on('click', '#btnBorrarFoto', function BorrarFotos() {
  
  if (confirm('Segur@ que desea borrar esta foto?')) {
    idFoto = $('#id_foto').val();
    rutaFoto =$('#ruta_foto').val();
    console.log(idFoto);
    $.post('../checkin/checkBorrar.php', { idFoto, rutaFoto }, (respuesta) => {
        console.log(respuesta);
    });

  }

});


