<?php
// Establecer conexión a la base de datos
$servername = "tu_servidor";
$username = "tu_usuario";
$password = "tu_contraseña";
$dbname = "tu_base_de_datos";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Obtener el ID del usuario (debería obtenerlo de algún lugar)
$id_usuario = 1; 

// Consulta SQL para obtener las fechas de pago y montos correspondientes
$sql = "SELECT fecha_pago, monto FROM FechasPago WHERE id_usuario = $id_usuario";
$result = $conn->query($sql);

$fechasPago = array();
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $fechasPago[] = array("fecha" => $row["fecha_pago"], "monto" => $row["monto"]);
    }
}

$conn->close();
?>

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
    <div id="fechasPago" class="mt-3">
      <ul class="list-group">
        <?php foreach ($fechasPago as $fechaPago): ?>
          <li class="list-group-item">
            <?php echo date("d/m/Y", strtotime($fechaPago["fecha"])); ?> - Monto a pagar: $<?php echo $fechaPago["monto"]; ?>
          </li>
        <?php endforeach; ?>
      </ul>
    </div>
  </div>
</body>
</html>