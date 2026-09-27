<?php
    require_once __DIR__ . '/../config/conexion.php';

    $consulta_select = "SELECT * FROM perfil_inicio";
    $resultado_select = mysqli_query($conn, $consulta_select);

?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Modificar Perfil</title>
  <link rel="stylesheet" href="styles_pages.css">
</head>
<body>

  <main class="form-wrapper">
    <h1 class="form-title">Modificar Perfil</h1>

    <!-- Formulario para enviar tus datos con PHP -->
    <form action="" method="POST" enctype="multipart/form-data">
      
      <div class="table-container">
        <table class="sql-table">
          <tbody>
            
            <?php while($fila = mysqli_fetch_assoc($resultado_select)): ?>
            <tr>
              <th><label for="columna_1">Nombre completo</label></th>
              <td>
                <input 
                  type="text" 
                  id="columna_1" 
                  name="columna_1" 
                  class="sql-input" 
                  placeholder="<?php echo $fila['nombre_completo']; ?>"
                >
              </td>
            </tr>

            <!-- CAMPO 2 (Texto largo / Textarea adaptable sin saltos de línea) -->
            <tr>
              <th><label for="columna_2">Fotografía personal</label></th>
              <td>
                <textarea 
                  id="columna_2" 
                  name="columna_2" 
                  class="sql-input" 
                  placeholder="<?php echo $fila['fotografia_de_perfil']; ?>"
                  
                ></textarea>
              </td>
            </tr>

            <!-- CAMPO 3 (Texto corto / Año / Fecha / etc.) -->
            <tr>
              <th><label for="columna_3">Descripción personal</label></th>
              <td>
                <textarea 
                  type="text" 
                  id="columna_3" 
                  name="columna_3" 
                  class="sql-input" 
                  placeholder="<?php echo $fila['descripcion_personal']; ?>"
                ></textarea>
              </td>
            </tr>

            <!-- CAMPO 4 (Otro Textarea) -->
            <tr>
              <th><label for="columna_4">Presentación corta</label></th>
              <td>
                <textarea 
                  id="columna_4" 
                  name="columna_4" 
                  class="sql-textarea" 
                  placeholder="<?php echo $fila['presentacion_corta']; ?>"
                  onkeydown="if(event.key === 'Enter') event.preventDefault();"></textarea>
              </td>
            </tr>
              <?php endwhile; ?>
          </tbody>
        </table>
      </div>

      <!-- Botón de Envío -->
      <div class="btn-container">
        <button type="submit" class="btn-submit">Guardar Cambios</button>
        <button type="button" class="btn-submit" onclick="window.location.href='../index.php'">Inicio</button>
      </div>

    </form>
  </main>

</body>
</html>