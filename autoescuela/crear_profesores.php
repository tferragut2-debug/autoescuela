<?php
include("conexion.php");

if ($_POST) {
    $nombre = $_POST['nombre'];
    $apellidos = $_POST['apellidos'];
    $dni = $_POST['dni'];
    $telefono = $_POST['telefono'];

    $sql = "INSERT INTO profesores (nombre, apellidos, dni, telefono)
            VALUES ('$nombre','$apellidos','$dni','$telefono')";

    mysqli_query($conexion, $sql);

    header("Location: profesores.php");
}
?>

<h2>Nuevo Profesor</h2>

<form method="POST">
Nombre: <input type="text" name="nombre"><br><br>
Apellidos: <input type="text" name="apellidos"><br><br>
DNI: <input type="text" name="dni"><br><br>
Teléfono: <input type="text" name="telefono"><br><br>
<input type="submit" value="Guardar">
</form>