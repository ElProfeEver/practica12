<?php include 'conexion.php'; ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD PHP</title>
    <link rel="stylesheet" href="css/estilo.css">
</head>
<body>
    <div class="container">
        <h1>Administrador de Registros</h1>
        
        <a href="crear.php" class="btn agregar">Agregar Nuevo</a>
        
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Correo</th>
                    <th>Contraseña</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT * FROM informacion";
                $resultado = $conexion->query($sql);
                
                if ($resultado->num_rows > 0) {
                    while($fila = $resultado->fetch_assoc()) {
                        echo "<tr>
                                <td>{$fila['id']}</td>
                                <td>{$fila['nombre']}</td>
                                <td>{$fila['correo']}</td>
                                <td>{$fila['pass']}</td>
                                <td>
                                    <a href='editar.php?id={$fila['id']}' class='btn editar'>Editar</a>
                                    <a href='eliminar.php?id={$fila['id']}' class='btn eliminar' onclick='return confirm(\"¿Estás seguro?\")'>Eliminar</a>
                                </td>
                              </tr>";
                    }
                } else {
                    echo "<tr><td colspan='5'>No hay registros</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>