<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagos de Entrenadora Física</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/bootstrap.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>

    <div class="d-flex justify-content-between m-5">
        <div class="card border-0 bg-white" style="width:400px">
            <a href="#paymentModal" data-toggle="modal" class="text-decoration-none text-primary">
                <img class="card-img-top"
                    src="https://grupokankun.com/wp-content/uploads/2020/02/primera-tarjeta-de-cre%CC%81dito.jpg"
                    alt="Card image" style="width:100%">
                <div class="card-body text-center">
                    <div class="text-center display-6">Transferencia</div>
                </div>
            </a>
        </div>
        <br>

        <div class="card border-0 bg-white" style="width:400px">
            <a href="https://www.paypal.com/cr/webapps/mpp/payment-method" target="_blank"
                class="text-decoration-none text-primary">
                <img class="card-img-top"
                    src="https://pics.paypal.com/00/s/NjQwYjhjNTktNDFhZi00OGRkLWI2MzgtMmMxZmE3OTY5YzU0/file.PNG"
                    alt="Card image" style="width:100%">
                <div class="card-body text-center">
                    <div class=" text-center display-6">Pagar con PayPal</div>
                </div>
            </a>
        </div>
        <br>

        <div class="card border-0 bg-white" style="width:400px">
            <a href="#" id="sinpeLink" data-toggle="modal" data-target="#sinpeModal"
                class="text-decoration-none text-primary">
                <img class="card-img-top"
                    src="https://play-lh.googleusercontent.com/QweCEZ_R81jSZMwQlBvX6ldqiNOZbJudyzJ6HcMOPuNt0XsjmRcXyJVWA6R7lv3RV9o"
                    alt="Card image" style="width:100%">
                <div class="card-body text-center">
                    <div class="text-center display-6">SINPE</div>
                </div>
            </a>
        </div>
        <br>
    </div>

    <div class="mt-4 p-5 bg-dark text-white">
        <h1 class="text-center text-success">Nota:</h1>
        <hr class="border-top border-success opacity-25 my-2">
        <h3 class="text-center text-white">Contactar con la entrenadora para confirmar pago y active la suscripcion</h3>
    </div>

    <!-- Modal -->
    <div id="paymentModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="paymentModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="paymentModalLabel">Payment Details</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="paymentForm">
                        <div class="form-group">
                            <label for="cardNumber">Número de Tarjeta</label>
                            <input type="text" class="form-control" id="cardNumber" placeholder="Enter card number"
                                required>
                        </div>
                        <div class="form-group">
                            <label for="expiry">Fecha de Vencimiento</label>
                            <input type="text" class="form-control" id="expiry" placeholder="MM/YY" required>
                        </div>
                        <div class="form-group">
                            <label for="cvv">CVV</label>
                            <input type="text" class="form-control" id="cvv" placeholder="CVV" required>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">cerrar</button>
                    <button type="button" class="btn btn-primary" id="payButton">Realizar Pago</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Bootstrap JS and jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script>
    $(document).ready(function() {
        $('#sinpeButton').popover();
        $("#payButton").click(function() {
            // Aquí podrías agregar la lógica para procesar el pago
            // Puedes obtener los valores de los campos de entrada usando jQuery o JavaScript vanilla
            var cardNumber = $("#cardNumber").val();
            var expiry = $("#expiry").val();
            var cvv = $("#cvv").val();
            if (!cardNumber || !expiry || !cvv) {
                alert("Por favor complete los campos para relizar el pago!");
                return;
            }
            // Aquí deberías hacer la validación de la tarjeta y el proceso de pago
            // Por simplicidad, aquí simplemente mostramos una alerta
            alert(
                "Pago procesado exitosamente. Se ha enviado una nota de confirmación a su correo electrónico."
                );
            // Cierra el modal después del pago
            $("#paymentModal").modal('hide');
        });
    });
    </script>
    <!-- SINPE Modal -->
    <div class="modal fade" id="sinpeModal" tabindex="-1" role="dialog" aria-labelledby="sinpeModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="sinpeModalLabel">Número SINPE</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>El número SINPE para realizar la transferencia es: <strong>########</strong></p>
                    <p>Para confirmar su compra de suscripción y para contactar con la entrenadora, puede
                        llamar al número: <strong>########</strong></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS and jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>

</html>