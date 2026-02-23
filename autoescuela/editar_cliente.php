<?php
include("conexion.php");

$id = $_GET['id'];

if ($_POST) {

    $nombre = $_POST['nombre'];
    $apellidos = $_POST['apellidos'];
    $dni = $_POST['dni'];
    $telefono = $_POST['telefono'];
    $email = $_POST['email'];

    $sql = "UPDATE clientes 
            SET nombre='$nombre',
                apellidos='$apellidos',
                dni='$dni',
                telefono='$telefono',
                email='$email'
            WHERE id=$id";

    mysqli_query($conexion, $sql);

    header("Location: clientes.php");
}

$resultado = mysqli_query($conexion, "SELECT * FROM clientes WHERE id=$id");
$cliente = mysqli_fetch_assoc($resultado);
?>

<h2>Editar Cliente</h2>

<form method="POST">
Nombre: <input type="text" name="nombre" value="<?php echo $cliente['nombre']; ?>"><br><br>
Apellidos: <input type="text" name="apellidos" value="<?php echo $cliente['apellidos']; ?>"><br><br>
DNI: <input type="text" name="dni" value="<?php echo $cliente['dni']; ?>"><br><br>
Teléfono: <input type="text" name="telefono" value="<?php echo $cliente['telefono']; ?>"><br><br>
Email: <input type="text" name="email" value="<?php echo $cliente['email']; ?>"><br><br>
<input type="submit" value="Actualizar">
</form>