<?php
include("conexion.php");

if ($_POST) {
    $matricula = $_POST['matricula'];
    $marca = $_POST['marca'];
    $modelo = $_POST['modelo'];
    $profesor_id = $_POST['profesor_id'];

    $sql = "INSERT INTO vehiculos (matricula, marca, modelo, profesor_id)
            VALUES ('$matricula','$marca','$modelo','$profesor_id')";

    mysqli_query($conexion, $sql);

    header("Location: vehiculos.php");
}
?>

<h2>Nuevo Vehículo</h2>

<form method="POST">
Matrícula: <input type="text" name="matricula"><br><br>
Marca: <input type="text" name="marca"><br><br>
Modelo: <input type="text" name="modelo"><br><br>
ID Profesor asignado (opcional): <input type="text" name="profesor_id"><br><br>
<input type="submit" value="Guardar">
</form>