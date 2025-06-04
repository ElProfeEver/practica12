<?php
include 'conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $correo = $_POST['correo'];
    $pass = $_POST['pass'];
    
    $sql = "INSERT INTO informacion (nombre, correo, pass) VALUES ('$nombre', '$correo', '$pass')";
    
    if ($conexion->query($sql) === TRUE) {
        header("Location: index.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conexion->error;
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Nuevo Registro</title>
    <link rel="stylesheet" href="css/estilo.css">
</head>
<body>
    <div class="container">
        <h1>Agregar Nuevo Registro</h1>
        
        <form action="crear.php" method="post">
            <div class="form-group">
                <label for="nombre">Nombre:</label>
                <input type="text" id="nombre" name="nombre" required>
            </div>
            
            <div class="form-group">
                <label for="email">Correo:</label>
                <input type="email" id="correo" name="correo" required>
            </div>
            
            <div class="form-group">
                <label for="pass">Contraseña:</label>
                <input type="password" id="pass" name="pass">
            </div>
            
            <button type="submit" class="btn agregar">Guardar</button>
            <a href="index.php" class="btn cancelar">Cancelar</a>
        </form>
    </div>
</body>
</html>