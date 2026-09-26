<?php
    require_once __DIR__ . '/../config/conexion.php';

    $consulta_select = "SELECT * FROM perfil_inicio";
    $resultado_select = mysqli_query($conn, $consulta_select);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar perfil</title>
</head>
<body>
    <form method="POST" action="actualizar_perfil.php">
        <table>
            <tr>
                <th>Nombre Completo</th>
                <th>Fotografía</th>
                <th>Descripción</th>
                <th>Presentación</th>
            </tr>
            <?php while($fila = mysqli_fetch_assoc($resultado_select)): ?>
            <tr>
                <td><input id="nombre_completo" type="text" name="nombre_completo" placeholder="<?php echo $fila['nombre_completo']; ?>" required></td>
                <td><input id="fotografia_de_perfil" type="text" name="fotografia_de_perfil" placeholder="<?php echo $fila['fotografia_de_perfil']; ?>" required></td>
                <td><input id="descripcion_personal" type="text" name="descripcion_personal" placeholder="<?php echo $fila['descripcion_personal']; ?>" required></td>
                <td><input id="presentacion_corta" type="text" name="presentacion_corta" placeholder="<?php echo $fila['presentacion_corta']; ?>" required></td>
            </tr>
            <?php endwhile; ?>
        </table>
    </form>

</body>
</html>