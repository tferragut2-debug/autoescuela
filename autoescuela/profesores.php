<?php
include("conexion.php");

$resultado = mysqli_query($conexion, "SELECT * FROM profesores WHERE borrado = 0");

echo "<h2>Lista de profesores</h2>";
echo "<a href='crear_profesor.php'>Nuevo profesor</a><br><br>";

echo "<table border='1'>";
echo "<tr>
        <th>Nombre</th>
        <th>Apellidos</th>
        <th>DNI</th>
        <th>Acciones</th>
      </tr>";

while ($fila = mysqli_fetch_assoc($resultado)) {
    echo "<tr>";
    echo "<td>".$fila['nombre']."</td>";
    echo "<td>".$fila['apellidos']."</td>";
    echo "<td>".$fila['dni']."</td>";
    echo "<td>
            <a href='editar_profesor.php?id=".$fila['id']."'>Editar</a> 
            <a href='borrar_profesor.php?id=".$fila['id']."'>Borrar</a>
          </td>";
    echo "</tr>";
}

echo "</table>";
?>