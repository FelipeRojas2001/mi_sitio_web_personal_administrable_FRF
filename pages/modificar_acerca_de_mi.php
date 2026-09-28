<?php
    require_once __DIR__ . '/../config/conexion.php';

    $consulta_select = "SELECT * FROM acerca_de_mi";
    $resultado_select = mysqli_query($conn, $consulta_select);

    $descripcionamplia = $_POST['columna_1'] ?? null;
    $intereses = $_POST['columna_2'] ?? null;
    $habilidades = $_POST['columna_3'] ?? null;
    $experienciaconocimientos = $_POST['columna_4'] ?? null;

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        actualizarPerfil(
            $conn,
            (string) $descripcionamplia,
            (string) $intereses,
            (string) $habilidades,
            (string) $experienciaconocimientos
        );
    }

    function actualizarAcercaDeMi(mysqli $conn, string $descripcion_amplia, string $intereses, string $habilidades, string $experiencia_conocimientos): void {
        $consulta_update = "UPDATE acerca_de_mi SET 
            descripcion_amplia = ?, 
            intereses = ?, 
            habilidades = ?, 
            experiencia_conocimientos = ? 
            WHERE id = 1"; // Suponiendo que solo hay un registro con id=1

        $stmt = mysqli_prepare($conn, $consulta_update);
        mysqli_stmt_bind_param($stmt, 'ssss', $descripcion_amplia, $intereses, $habilidades, $experiencia_conocimientos);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
    }

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
              <th><label for="columna_1">Descripción amplia</label></th>
              <td>
                <input 
                  type="text" 
                  id="columna_1" 
                  name="columna_1" 
                  class="sql-input" 
                  value="<?php echo $fila['descripcion_amplia']; ?>"
                >
              </td>
            </tr>

            <!-- CAMPO 2 (Texto largo / Textarea adaptable sin saltos de línea) -->
            <tr>
              <th><label for="columna_2">Intereses</label></th>
              <td>
                <textarea 
                  id="columna_2" 
                  name="columna_2" 
                  class="sql-input"><?php echo $fila['intereses']; ?></textarea>
              </td>
            </tr>

            <!-- CAMPO 3 (Texto corto / Año / Fecha / etc.) -->
            <tr>
              <th><label for="columna_3">Habilidades</label></th>
              <td>
                <textarea 
                  type="text" 
                  id="columna_3" 
                  name="columna_3" 
                  class="sql-input" 
                ><?php echo $fila['habilidades']; ?></textarea>
              </td>
            </tr>

            <!-- CAMPO 4 (Otro Textarea) -->
            <tr>
              <th><label for="columna_4">Experiencia y conocimientos</label></th>
              <td>
                <textarea 
                  id="columna_4" 
                  name="columna_4" 
                  class="sql-textarea" 
                  onkeydown="if(event.key === 'Enter') event.preventDefault();"><?php echo $fila['experiencia_conocimientos']; ?></textarea>
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