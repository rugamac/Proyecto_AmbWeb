<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Pagos de Entrenadora Física</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <style>
    /* Estilos personalizados */
    /* Puedes agregar estilos personalizados aquí si es necesario */
  </style>
</head>
<body>

<div class="container mt-5">
  <h2 class="mb-4">Realizar Pago</h2>
  
  <div class="form-group">
    <label for="monto">Monto a Pagar:</label>
    <input type="text" class="form-control" id="monto" placeholder="Ingrese el monto">
  </div>

  <div class="form-group">
    <label for="metodoPago">Seleccione el Método de Pago:</label>
    <select class="form-control" id="metodoPago">
      <option value="paypal">PayPal</option>
      <option value="tarjeta">Tarjeta de Crédito</option>
      <option value="sinpe">SINPE Móvil</option>
    </select>
  </div>

  <button type="button" class="btn btn-primary" onclick="realizarPago()">Pagar</button>
</div>

<script>
  function realizarPago() {
    var monto = document.getElementById("monto").value;
    var metodoPago = document.getElementById("metodoPago").value;
    
    switch (metodoPago) {
      case "paypal":
        window.location.href = "https://www.paypal.com";
        break;
      case "tarjeta":
        window.location.href = "https://www.tupaginadetarjetas.com";
        break;
      case "sinpe":
        window.location.href = "https://www.sinpemovil.com";
        break;
      default:
        alert("Seleccione un método de pago válido");
    }
  }
</script>

</body>
</html>