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
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
      <div class="row">
        <div class="col-md-6">
          <div class="form-group">
            <label for="fechaInicio">Fecha de Inicio:</label>
            <input type="date" class="form-control" id="fechaInicio" name="fechaInicio">
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <label for="fechaFin">Fecha de Fin:</label>
            <input type="date" class="form-control" id="fechaFin" name="fechaFin">
          </div>
        </div>
      </div>
      <button type="submit" class="btn btn-primary btn-block" name="generarFechas">Generar Fechas de Pago</button>
    </form>

    <div id="fechasPago">
      <?php
      if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['generarFechas'])) {
          $fechaInicio = $_POST['fechaInicio'];
          $fechaFin = $_POST['fechaFin'];
          
          if (!empty($fechaInicio) && !empty($fechaFin)) {

              $fechasPago = generarFechasPago($fechaInicio, $fechaFin);
              echo '<ul class="list-group">';
              foreach ($fechasPago as $fecha) {
                  echo '<li class="list-group-item">' . $fecha . '</li>';
              }
              echo '</ul>';
          } else {
              echo '<p class="text-danger">Por favor, selecciona ambas fechas.</p>';
          }
      }

      function generarFechasPago($fechaInicio, $fechaFin) {
          $inicio = new DateTime($fechaInicio);
          $fin = new DateTime($fechaFin);

          $fechasPago = array();
          while ($inicio <= $fin) {
              $fechasPago[] = $inicio->format('Y-m-d');
              $inicio->modify('+1 month');
          }
          return $fechasPago;
      }
      ?>
    </div>
  </div>
</body>
</html>