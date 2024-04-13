<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Fechas de Pago de Citas - Entrenadora Física</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
  <div class="container">
    <h1>Fechas de Pago de Citas</h1>
    <div class="row">
      <div class="col-md-6">
        <label for="fechaInicio">Fecha de Inicio:</label>
        <input type="date" class="form-control" id="fechaInicio">
      </div>
      <div class="col-md-6">
        <label for="fechaFin">Fecha de Fin:</label>
        <input type="date" class="form-control" id="fechaFin">
      </div>
    </div>
    <button class="btn btn-primary btn-block" id="generarFechas">Generar Fechas de Pago</button>
    <div id="fechasPago" class="mt-3">
    </div>
    <a href="pago.php" id="pagar" class="btn btn-success btn-block mt-3" style="display: none;">Pagar</a>
  </div>

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script>
    document.getElementById('generarFechas').addEventListener('click', function() {
      var fechaInicio = document.getElementById('fechaInicio').value;
      var fechaFin = document.getElementById('fechaFin').value;
      var fechasPago = generarFechasPago(fechaInicio, fechaFin);

      mostrarFechasPago(fechasPago);
    });

    function generarFechasPago(fechaInicio, fechaFin) {
      var fechasPago = [];
      var inicio = new Date(fechaInicio);
      var fin = new Date(fechaFin);

      var fechaActual = new Date(inicio);
      while (fechaActual <= fin) {
        fechasPago.push(new Date(fechaActual));
        fechaActual.setMonth(fechaActual.getMonth() + 1);
      }
      return fechasPago;
    }

    function mostrarFechasPago(fechasPago) {
      var fechasPagoDiv = document.getElementById('fechasPago');
      fechasPagoDiv.innerHTML = '';

      if (fechasPago.length === 0) {
        fechasPagoDiv.innerHTML = '<p>No se encontraron fechas de pago.</p>';
        return;
      }

      var ul = document.createElement('ul');
      ul.classList.add('list-group');
      fechasPago.forEach(function(fecha) {
        var li = document.createElement('li');
        li.classList.add('list-group-item');
        li.textContent = fecha.toLocaleDateString('es-ES', { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' });
        ul.appendChild(li);
      });
      fechasPagoDiv.appendChild(ul);

      // Mostrar el botón de pago
      document.getElementById('pagar').style.display = 'block';
    }
  </script>
</body>
</html>