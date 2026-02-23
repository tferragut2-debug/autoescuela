<?php
include("conexion.php");

$resultado = mysqli_query($conexion, "SELECT * FROM vehiculos WHERE borrado = 0");

echo "<h2>Lista de vehículos</h2>";
echo "<a href='crear_vehiculo.php'>Nuevo vehículo</a><br><br>";

echo "<table border='1'>";
echo "<tr>
        <th>Matrícula</th>
        <th>Marca</th>
        <th>Modelo</th>
        <th>Profesor Asignado</th>
        <th>Acciones</th>
      </tr>";

while ($fila = mysqli_fetch_assoc($resultado)) {
    echo "<tr>";
    echo "<td>".$fila['matricula']."</td>";
    echo "<td>".$fila['marca']."</td>";
    echo "<td>".$fila['modelo']."</td>";
    echo "<td>".$fila['profesor_id']."</td>";
    echo "<td>
            <a href='editar_vehiculo.php?id=".$fila['id']."'>Editar</a> 
            <a href='borrar_vehiculo.php?id=".$fila['id']."'>Borrar</a>
          </td>";
    echo "</tr>";
}

echo "</table>";
?>