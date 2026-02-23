<?php
include("conexion.php");

$id = $_GET['id'];

$sql = "UPDATE clientes SET borrado = 1 WHERE id=$id";
mysqli_query($conexion, $sql);

header("Location: clientes.php");
?>