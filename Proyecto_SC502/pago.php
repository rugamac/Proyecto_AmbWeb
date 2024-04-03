<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Pago de Citas - Entrenadora Física</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
  <div class="container">
    <h1>Pago de Citas</h1>
    <form id="paymentForm">
      <div class="form-group">
        <label for="nombre">Nombre:</label>
        <input type="text" class="form-control" id="nombre" placeholder="Ingresa tu nombre" required>
      </div>
      <div class="form-group">
        <label for="email">Correo Electrónico:</label>
        <input type="email" class="form-control" id="email" placeholder="Ingresa tu correo electrónico" required>
      </div>
      <div class="form-group">
        <label for="tarjeta">Número de Tarjeta:</label>
        <input type="text" class="form-control" id="tarjeta" placeholder="Ingresa el número de tu tarjeta" required>
      </div>
      <div class="form-row">
        <div class="col">
          <label for="fechaExpiracion">Fecha de Expiración:</label>
          <input type="text" class="form-control" id="fechaExpiracion" placeholder="MM/AA" required>
        </div>
        <div class="col">
          <label for="codigoSeguridad">Código de Seguridad:</label>
          <input type="text" class="form-control" id="codigoSeguridad" placeholder="CVC" required>
        </div>
      </div>
      <button type="submit" class="btn btn-primary btn-block mt-3">Pagar Cita</button>
    </form>
  </div>

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script>
    $(document).ready(function() {
      $('#paymentForm').submit(function(event) {
        event.preventDefault(); 
        
        var nombre = $('#nombre').val();
        var email = $('#email').val();
        var tarjeta = $('#tarjeta').val();
        var fechaExpiracion = $('#fechaExpiracion').val();
        var codigoSeguridad = $('#codigoSeguridad').val();
        
       
        if (nombre.trim() === '' || email.trim() === '' || tarjeta.trim() === '' || fechaExpiracion.trim() === '' || codigoSeguridad.trim() === '') {
          alert('Por favor, completa todos los campos del formulario.');
          return;
        }
        
        if (!validarTarjeta(tarjeta) || !validarFechaExpiracion(fechaExpiracion)) {
          alert('Por favor, ingresa un número de tarjeta y fecha de expiración válidos.');
          return;
        }
        alert('¡Pago realizado con éxito!');
    
        $('#paymentForm')[0].reset();
      });
    });
    function validarTarjeta(numeroTarjeta) {
      return /^\d{16}$/.test(numeroTarjeta);
    }
    function validarFechaExpiracion(fechaExpiracion) {
      var expiracion = fechaExpiracion.split('/');
      var mes = parseInt(expiracion[0], 10);
      var anio = parseInt(expiracion[1], 10);
      var ahora = new Date();
      return mes >= 1 && mes <= 12 && anio >= ahora.getFullYear() && anio <= (ahora.getFullYear() + 10);
    }
  </script>
</body>
</html>