<?php
$login = false;
require_once "include/templates/headerClientes.php";

<?php
    // Verificar si se ha enviado el formulario
    if (isset($_POST['eliminar'])) {
        // Procesar la solicitud de eliminación
        $rutina_id = $_POST['rutina_id'];

        // Conexión a la base de datos (reemplaza los valores según tu configuración)
        $servername = "localhost";
        $username = "usuario";
        $password = "contraseña";
        $dbname = "nombre_base_de_datos";

        // Crear conexión
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Verificar la conexión
        if ($conn->connect_error) {
            die("Conexión fallida: " . $conn->connect_error);
        }

        // Consulta para eliminar la rutina
        $sql = "DELETE FROM rutinas WHERE id = $rutina_id";

        if ($conn->query($sql) === TRUE) {
            echo "<p>Rutina eliminada correctamente.</p>";
        } else {
            echo "Error al eliminar la rutina: " . $conn->error;
        }

        // Cerrar conexión
        $conn->close();
    }
    ?>
</body>
</html>
