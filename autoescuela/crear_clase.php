<?php
include("conexion.php");

if ($_POST) {
    $cliente_id = $_POST['cliente_id'];
    $fecha = $_POST['fecha'];
    $hora = $_POST['hora'];

    // 1. Comprobar que el cliente no tenga otra clase ese día
    $res = mysqli_query($conexion, "SELECT * FROM clases WHERE cliente_id=$cliente_id AND fecha='$fecha'");
    if(mysqli_num_rows($res) > 0){
        die("Este cliente ya tiene clase en esta fecha.");
    }

    // 2. Buscar profesor disponible
    $res_p = mysqli_query($conexion, "SELECT id FROM profesores WHERE borrado=0 AND id NOT IN (
        SELECT profesor_id FROM clases WHERE fecha='$fecha' AND hora='$hora'
    ) ORDER BY id LIMIT 1");

    $profesor = mysqli_fetch_assoc($res_p);
    if(!$profesor) die("No hay profesor disponible a esta hora.");
    $profesor_id = $profesor['id'];

    // 3. Buscar vehículo disponible
    $res_v = mysqli_query($conexion, "SELECT id FROM vehiculos WHERE borrado=0 AND id NOT IN (
        SELECT vehiculo_id FROM clases WHERE fecha='$fecha' AND hora='$hora'
    ) ORDER BY id LIMIT 1");

    $vehiculo = mysqli_fetch_assoc($res_v);
    if(!$vehiculo) die("No hay vehículo disponible a esta hora.");
    $vehiculo_id = $vehiculo['id'];

    // 4. Insertar la clase en la tabla
    $sql = "INSERT INTO clases (cliente_id, profesor_id, vehiculo_id, fecha, hora)
            VALUES ($cliente_id, $profesor_id, $vehiculo_id, '$fecha', '$hora')";
    mysqli_query($conexion, $sql);

    header("Location: clases.php");
}

// Lista de clientes para el formulario
$clientes = mysqli_query($conexion, "SELECT id, nombre, apellidos FROM clientes WHERE borrado=0");
?>

<h2>Nueva Clase</h2>

<form method="POST">
Cliente:
<select name="cliente_id">
<?php while($c = mysqli_fetch_assoc($clientes)): ?>
    <option value="<?php echo $c['id']; ?>"><?php echo $c['nombre']." ".$c['apellidos']; ?></option>
<?php endwhile; ?>
</select><br><br>

Fecha: <input type="date" name="fecha" required><br><br>
Hora: <input type="time" name="hora" min="10:00" max="17:00" required><br><br>

<input type="submit" value="Crear Clase">
</form>