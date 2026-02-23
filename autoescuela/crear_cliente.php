<?php
include("conexion.php");

if ($_POST) {

    $nombre = $_POST['nombre'];
    $apellidos = $_POST['apellidos'];
    $dni = $_POST['dni'];
    $telefono = $_POST['telefono'];
    $email = $_POST['email'];
    $fecha = date("Y-m-d");

    $sql = "INSERT INTO clientes (nombre, apellidos, dni, telefono, email, fecha_alta)
            VALUES ('$nombre','$apellidos','$dni','$telefono','$email','$fecha')";

    mysqli_query($conexion, $sql);

    header("Location: clientes.php");
}
?>

<h2>Nuevo Cliente</h2>

<form method="POST">
Nombre: <input type="text" name="nombre"><br><br>
Apellidos: <input type="text" name="apellidos"><br><br>
DNI: <input type="text" name="dni"><br><br>
Teléfono: <input type="text" name="telefono"><br><br>
Email: <input type="text" name="email"><br><br>
<input type="submit" value="Guardar">
</form>