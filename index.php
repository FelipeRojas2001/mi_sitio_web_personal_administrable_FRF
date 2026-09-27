<?php

    require_once __DIR__ . "/config/conexion.php";

    
    $consulta_perfil_inicio = "SELECT * FROM perfil_inicio";
    $resultado_perfil_inicio = mysqli_query($conn, $consulta_perfil_inicio);
    
    $consulta_acerca_de_mi = "SELECT * FROM acerca_de_mi";
    $resultado_acerca_de_mi = mysqli_query($conn, $consulta_acerca_de_mi);
    
    $consulta_atestados = "SELECT * FROM atestados";
    $resultado_atestados = mysqli_query($conn, $consulta_atestados);

    $consulta_galeria = "SELECT * FROM galeria";
    $resultado_galeria = mysqli_query($conn, $consulta_galeria);

    $consulta_contacto = "SELECT * FROM contacto";
    $resultado_contacto = mysqli_query($conn, $consulta_contacto);
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Mi web personal</title>
  <link rel="stylesheet" href="styles.css">
</head>
<body>

  <main class="main-wrapper">

    <!-- SECCIÓN 1 -->
    <section class="section-block">
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

            <div class="btn-container">
                <button type="button" class="btn-submit" onclick="window.location.href='pages/modificar_perfil.php'">Actualizar Perfil</button>
            </div>
    </section>

    <!-- SECCIÓN 2 -->
    <section class="section-block">
      <h2>Acerca de Mí</h2>
        <?php if (!$resultado_acerca_de_mi): ?>
            <div class="alert error">
                Error al consultar: <?php echo htmlspecialchars(mysqli_error($conn)); ?>
            </div>
        <?php elseif (mysqli_num_rows($resultado_acerca_de_mi) === 0): ?>
            <div class="alert error">
                No hay información acerca de mí registrada.
            </div>
        <?php else: ?>
            <?php $fila = mysqli_fetch_assoc($resultado_acerca_de_mi); ?>
            <p><?php echo htmlspecialchars($fila["descripcion_amplia"]); ?></p>
            <h3>Intereses</h3><p><?php echo htmlspecialchars($fila["intereses"]); ?></p>
            <h3>Habilidades</h3><p><?php echo htmlspecialchars($fila["habilidades"]); ?></p>
            <h3>Experiencia y Conocimientos</h3><p><?php echo htmlspecialchars($fila["experiencia_conocimientos"]); ?></p>
        <?php endif; ?>
    </section>

    <!-- SECCIÓN 3 -->
    <section class="section-block">
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

    <!-- SECCIÓN 4 -->
    <section class="section-block">
      <h2>Galería</h2>
        <?php if (!$resultado_galeria): ?>
            <div class="alert error">
                Error al consultar: <?php echo htmlspecialchars(mysqli_error($conn)); ?>
            </div>
        <?php elseif (mysqli_num_rows($resultado_galeria) === 0): ?>
            <div class="alert error">
                No hay imágenes en la galería.
            </div>
        <?php else: ?>
            <?php while ($fila = mysqli_fetch_assoc($resultado_galeria)): ?>
                <div class="galeria">
                    <img src="<?php echo htmlspecialchars($fila["imagen"]); ?>" alt="Imagen de la galería">
                    <p><?php echo htmlspecialchars($fila["breve_descripcion"]); ?></p>
                </div>
            <?php endwhile; ?>
        <?php endif; ?>
    </section>

    <!-- SECCIÓN 5 -->
    <section class="section-block">
      <h2>Contacto</h2>
        <?php if (!$resultado_contacto): ?>
            <div class="alert error">
                Error al consultar: <?php echo htmlspecialchars(mysqli_error($conn)); ?>
            </div>
        <?php elseif (mysqli_num_rows($resultado_contacto) === 0): ?>
            <div class="alert error">
                No hay información de contacto registrada.
            </div>
        <?php else: ?>
            <?php $fila = mysqli_fetch_assoc($resultado_contacto); ?>
            <p><strong>Correo:</strong> <?php echo htmlspecialchars($fila["correo_electronico"]); ?></p>
            <p><strong>Teléfono:</strong> <?php echo htmlspecialchars($fila["numero_telefono"]); ?></p>
            <p><strong>Redes Sociales:</strong> <?php echo htmlspecialchars($fila["redes_sociales"]); ?></p>
            <p><strong>Dirección:</strong> <?php echo htmlspecialchars($fila["direccion_fisica"]); ?></p>
        <?php endif; ?>
    </section>

  </main>

</body>
</html>