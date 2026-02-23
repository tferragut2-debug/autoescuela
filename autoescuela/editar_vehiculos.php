<?php
include("conexion.php");

$id = $_GET['id'];

if ($_POST) {
    $matricula = $_POST['matricula'];
    $marca = $_POST['marca'];
    $modelo = $_POST['modelo'];
    $profesor_id = $_POST['profesor_id'];

    $sql = "UPDATE vehiculos 
            SET matricula='$matricula',
                marca='$marca',
                modelo='$modelo',
                profesor_id='$profesor_id'
            WHERE id=$id";

    mysqli_query($conexion, $sql);

    header("Location: vehiculos.php");
}

$resultado = mysqli_query($conexion, "SELECT * FROM vehiculos WHERE id=$id");
$vehiculo = mysqli_fetch_assoc($resultado);
?>

<h2>Editar Vehículo</h2>

<form method="POST">
Matrícula: <input type="text" name="matricula" value="<?php echo $vehiculo['matricula']; ?>"><br><br>
Marca: <input type="text" name="marca" value="<?php echo $vehiculo['marca']; ?>"><br><br>
Modelo: <input type="text" name="modelo" value="<?php echo $vehiculo['modelo']; ?>"><br><br>
ID Profesor asignado (opcional): <input type="text" name="profesor_id" value="<?php echo $vehiculo['profesor_id']; ?>"><br><br>
<input type="submit" value="Actualizar">
</form>