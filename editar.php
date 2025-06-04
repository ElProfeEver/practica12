<?php
include 'conexion.php';

$id = $_GET['id'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $correo = $_POST['correo'];
    $pass = $_POST['pass'];
    
    $sql = "UPDATE informacion SET nombre='$nombre', correo='$correo', pass='$pass' WHERE id=$id";
    
    if ($conexion->query($sql) === TRUE) {
        header("Location: index.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conexion->error;
    }
}

$sql = "SELECT * FROM informacion WHERE id=$id";
$resultado = $conexion->query($sql);
$fila = $resultado->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Registro</title>
    <link rel="stylesheet" href="css/estilo.css">
</head>
<body>
    <div class="container">
        <h1>Editar Registro</h1>
        
        <form action="editar.php?id=<?php echo $id; ?>" method="post">
            <div class="form-group">
                <label for="nombre">Nombre:</label>
                <input type="text" id="nombre" name="nombre" value="<?php echo $fila['nombre']; ?>" required>
            </div>
            
            <div class="form-group">
                <label for="email">correo:</label>
                <input type="email" id="correo" name="correo" value="<?php echo $fila['correo']; ?>" required>
            </div>
            
            <div class="form-group">
                <label for="pass">Contraseña:</label>
                <input type="password" id="pass" name="pass" value="<?php echo $fila['pass']; ?>">
            </div>
            
            <button type="submit" class="btn editar">Actualizar</button>
            <a href="index.php" class="btn cancelar">Cancelar</a>
        </form>
    </div>
</body>
</html>