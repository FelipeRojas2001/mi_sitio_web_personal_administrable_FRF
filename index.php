<?php

    require_once __DIR__ . "/config/conexion.php";

    
    $consulta_perfil_inicio = "SELECT * FROM perfil_inicio";
    $resultado_perfil_inicio = mysqli_query($conn, $consulta_perfil_inicio);
    
    $consulta_sobre_mi = "SELECT * FROM acerca_de_mi";
    $resultado_sobre_mi = mysqli_query($conn, $consulta_sobre_mi);
    
    $consulta_atestados = "SELECT * FROM atestados";
    $resultado_atestados = mysqli_query($conn, $consulta_atestados);

    $consulta_galeria = "SELECT * FROM galeria";
    $resultado_galeria = mysqli_query($conn, $consulta_galeria);

    $consulta_contacto = "SELECT * FROM contacto";
    $resultado_contacto = mysqli_query($conn, $consulta_contacto);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
</head>
<body>

<header>
    <h1>Mi Sitio Web Personal</h1>
</header>

<main> 
    <section id="Inicio">
        <h2>Inicio</h2>
        <?php if (!$resultado_perfil_inicio): ?>
            <div class="alert error">
                Error al consultar: <?php echo htmlspecialchars(mysqli_error($conn)); ?>
            </div>
        <?php elseif (mysqli_num_rows($resultado_perfil_inicio) === 0): ?>
            <div class="alert error">
                No hay información de perfil de inicio registrada.
            </div>
        <?php else: ?>
            <?php $fila = mysqli_fetch_assoc($resultado_perfil_inicio); ?>
            <h3><?php echo htmlspecialchars($fila["nombre_completo"]); ?></h3>
            <img src="<?php echo htmlspecialchars($fila["fotografia_de_perfil"]); ?>" alt="Fotografía de perfil">
            <p><?php echo htmlspecialchars($fila["descripcion_personal"]); ?></p>
            <p><?php echo htmlspecialchars($fila["presentacion_corta"]); ?></p>
        <?php endif; ?>
    </section>
    <section id="Atestados">
        <h2>Mis Atestados</h2>
        <?php if (!$resultado_atestados): ?>
            <div class="alert error">
                Error al consultar: <?php echo htmlspecialchars(mysqli_error($conn)); ?>
            </div>
        <?php elseif (mysqli_num_rows($resultado_atestados) === 0): ?>
            <div class="alert error">
                No hay atestados registrados.
            </div>
        <?php else: ?>
            <?php while ($fila = mysqli_fetch_assoc($resultado_atestados)): ?>
                <div class="atestados">
                    <h3><?php echo htmlspecialchars($fila["titulo"]); ?></h3>
                    <p><strong>Institución:</strong> <?php echo htmlspecialchars($fila["institucion"]); ?></p>
                    <p><strong>Año:</strong> <?php echo htmlspecialchars($fila["año"]); ?></p>
                    <p><?php echo htmlspecialchars($fila["descripcion"]); ?></p>
                    <img src="<?php echo htmlspecialchars($fila["imagen"]); ?>" alt="Imagen del atestado">
                </div>
            <?php endwhile; ?>
        <?php endif; ?>

    </section>
</main>





</body>
</html>