<?php
include("conexion.php");

$id = $_GET['id'];

$sql = "UPDATE vehiculos SET borrado = 1 WHERE id=$id";
mysqli_query($conexion, $sql);

header("Location: vehiculos.php");
?>