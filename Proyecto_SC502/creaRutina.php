<?php
$login = false;
require_once "include/templates/headerClientes.php";


<main class="contenedor">
    <h1>Listar clientes</h1>

    <div>
        <p><?= $ingreso==1? "Se ingreso la rutina correctamente" : "" ; ?></p>

<?php
        require_once "DAL/cliente.php";
        $elSQL = "select id, nombre, correo, telefono from clientes";
        $myArray = getArray($elSQL);

        // var_dump($myArray);
        // echo json_encode($myArray, JSON_UNESCAPED_UNICODE);
        ?>

<div>
    <h2>Datos de los Clientes</h2>
    <table width=90%>
        <tr>
            <th>Nombre</th>
            <th>Correo</th>
            <th>Teléfono</th>
            <th>Edad</th>
            <th>Antecedentes médicos</th>
            <th>Tiempo de actividad</th>
            <th>Embarazos o cirugías</th>
            <th>Subscripción</th>
        </tr>
        <?php
                if(!empty($myArray)){
                    foreach ($myArray as $value) {
                        echo "<tr>";
                        echo "<td>" . $value['nombre'] . "</td>";
                        echo "<td>" . $value['correo'] . "</td>";
                        echo "<td>{$value['telefono']}</td>";
                        echo "<td>{$value['edad']}</td>";
                        echo "<td>{$value['antecedentes médicos']}</td>";
                        echo "<td>{$value['tiempo de actividad']}</td>";
                        echo "<td>{$value['embarazos o cirugias']}</td>";
                        echo "<td>{$value['Subscripcion']}</td>";

                        echo "<td><a href=mostrarCliente.php?id={$value['id']}>Ver</a></td>";
                        echo "<td><a href=editarCliente.php?id={$value['id']}>Editar</a></td>";
                        
                        echo "</tr>";
                    }
                }else{
                    echo "<tr><td>No hay registros de Rutina</td></tr>";
                }
                ?>

    </table>
</div>


</div>
</main>

<?php
// include_once "include/templates/header.php";
include "include/templates/footer.php";
?>