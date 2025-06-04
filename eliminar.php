<?php
include 'conexion.php';

$id = $_GET['id'];

$sql = "DELETE FROM informacion WHERE id=$id";

if ($conexion->query($sql) === TRUE) {
    header("Location: index.php");
    exit();
} else {
    echo "Error al eliminar: " . $conexion->error;
}

$conexion->close();
?>