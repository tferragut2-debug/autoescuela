<?php
include("conexion.php");

$id = $_GET['id'];

if ($_POST) {
    $nombre = $_POST['nombre'];
    $apellidos = $_POST['apellidos'];
    $dni = $_POST['dni'];
    $telefono = $_POST['telefono'];

    $sql = "UPDATE profesores 
            SET nombre='$nombre',
                apellidos='$apellidos',
                dni='$dni',
                telefono='$telefono'
            WHERE id=$id";

    mysqli_query($conexion, $sql);

    header("Location: profesores.php");
}

$resultado = mysqli_query($conexion, "SELECT * FROM profesores WHERE id=$id");
$profesor = mysqli_fetch_assoc($resultado);
?>

<h2>Editar Profesor</h2>

<form method="POST">
Nombre: <input type="text" name="nombre" value="<?php echo $profesor['nombre']; ?>"><br><br>
Apellidos: <input type="text" name="apellidos" value="<?php echo $profesor['apellidos']; ?>"><br><br>
DNI: <input type="text" name="dni" value="<?php echo $profesor['dni']; ?>"><br><br>
Teléfono: <input type="text" name="telefono" value="<?php echo $profesor['telefono']; ?>"><br><br>
<input type="submit" value="Actualizar">
</form>