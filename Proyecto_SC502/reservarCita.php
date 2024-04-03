<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Reserva de Citas - Entrenadora Física</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <style>
    /* Agregar estilos personalizados aquí */
  </style>
</head>
<body>
  <div class="container mt-5">
    <h1 class="text-center">Reserva de Citas</h1>
    <div class="row mt-4">
      <div class="col-md-6 offset-md-3">
        <form id="appointmentForm">
          <div class="form-group">
            <label for="nombre">Nombre:</label>
            <input type="text" class="form-control" id="nombre" placeholder="Ingresa tu nombre" required>
          </div>
          <div class="form-group">
            <label for="email">Correo Electrónico:</label>
            <input type="email" class="form-control" id="email" placeholder="Ingresa tu correo electrónico" required>
          </div>
          <div class="form-group">
            <label for="fecha">Fecha de la Cita:</label>
            <input type="date" class="form-control" id="fecha" required>
          </div>
          <div class="form-group">
            <label for="hora">Hora de la Cita:</label>
            <input type="time" class="form-control" id="hora" required>
          </div>
          <button type="submit" class="btn btn-primary btn-block">Reservar Cita</button>
        </form>
      </div>
    </div>
  </div>

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script>
   $(document).ready(function() {
      $('#appointmentForm').submit(function(event) {
        event.preventDefault(); // Evita que el formulario se envíe de forma predeterminada
        
        // Recuperar los valores del formulario
        var nombre = $('#nombre').val();
        var email = $('#email').val();
        var fecha = $('#fecha').val();
        var hora = $('#hora').val();
        
        // Crear objeto de datos para enviar al backend
        var datos = {
          nombre: nombre,
          email: email,
          fecha: fecha,
          hora: hora
        };
        
        // Realizar la solicitud AJAX
        $.ajax({
          type: 'POST', // Método HTTP
          url: 'tu_backend_url', // URL del backend donde se procesarán los datos
          data: datos, // Datos a enviar al backend
          success: function(response) {
            // Manejar la respuesta exitosa del backend (si es necesario)
            console.log('Respuesta del backend:', response);
            // Por ejemplo, mostrar un mensaje de éxito al usuario
            alert('Cita reservada con éxito!');
          },
          error: function(xhr, status, error) {
            // Manejar el error en la solicitud AJAX
            console.error('Error en la solicitud AJAX:', error);
            // Por ejemplo, mostrar un mensaje de error al usuario
            alert('Ha ocurrido un error al procesar la reserva de la cita. Por favor, inténtalo de nuevo más tarde.');
          }
        });
      });
    });
  </script>
</body>
</html>