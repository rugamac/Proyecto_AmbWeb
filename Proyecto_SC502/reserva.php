<?php
$login = false;
require_once "include/templates/headerClientes.php";

class reserva {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function crearReserva($fecha, $hora, $nombreCliente, $correoCliente) {
        $stmt = $this->conn->prepare("INSERT INTO reservas (fecha, hora, nombre_cliente, correo_cliente) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $fecha, $hora, $nombreCliente, $correoCliente);
        return $stmt->execute();
    }

    public function obtenerReserva($id) {
        $stmt = $this->conn->prepare("SELECT * FROM reservas WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }

    public function actualizarReserva($id, $fecha, $hora, $nombreCliente, $correoCliente) {
        $stmt = $this->conn->prepare("UPDATE reservas SET fecha = ?, hora = ?, nombre_cliente = ?, correo_cliente = ? WHERE id = ?");
        $stmt->bind_param("ssssi", $fecha, $hora, $nombreCliente, $correoCliente, $id);
        return $stmt->execute();
    }

    public function eliminarReserva($id) {
        $stmt = $this->conn->prepare("DELETE FROM reservas WHERE id = ?");
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }
}

// Ejemplo de uso
$db = new mysqli("localhost", "usuario", "contraseña", "nombre_base_de_datos");
if ($db->connect_error) {
    die("Error de conexión: " . $db->connect_error);
}

$reservaCRUD = new ReservaCRUD($db);

// Crear una reserva
$reservaCRUD->crearReserva("2024-02-28", "10:00", "Juan", "juan@example.com");

// Obtener una reserva por su ID
$reservaObtenida = $reservaCRUD->obtenerReserva(1);
print_r($reservaObtenida);

// Actualizar una reserva
$reservaCRUD->actualizarReserva(1, "2024-02-28", "11:00", "Juan Perez", "juan.perez@example.com");

// Eliminar una reserva
$reservaCRUD->eliminarReserva(1);
?>