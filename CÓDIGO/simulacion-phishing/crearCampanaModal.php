<?php
require_once 'assets/database/config.php';

if ($conn === null || mysqli_connect_errno()) {
  die('Error al conectar con la base de datos: ' . mysqli_connect_error());
}

// Función para obtener las plantillas de correo
function obtenerPlantillasCorreo($conn)
{
  if ($conn !== null && !mysqli_connect_errno()) {
    $sql = "SELECT IDPlantilla, Nombre, Asunto, Cuerpo, LogoURL FROM PlantillasCorreo";
    $resultado = mysqli_query($conn, $sql);

    if ($resultado) {
      $plantillas = [];

      while ($fila = mysqli_fetch_assoc($resultado)) {
        $plantillas[] = $fila;
      }
      return $plantillas;
    } else {
      return [];
    }
  } else {
    return [];
  }
}
?>

<div class="modal fade" id="crearCampanaModal" tabindex="-1" role="dialog" aria-labelledby="crearCampanaModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="crearCampanaModalLabel">Crear Nueva Campaña de Phishing</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="formCrearCampana" method="POST" action="assets/database/crearCampana.php" enctype="multipart/form-data">
        <div class="modal-body">
          <div class="form-group">
            <label for="tipoCampana">Tipo de Campaña:</label>
            <select class="form-control" id="tipoCampana" name="tipoCampana" required>
              <option value="">Seleccione una opción</option>
              <option value="personalizada" selected>Personalizada</option>
              <option value="predeterminada">Predefinida</option>
            </select>
            <input type="hidden" id="tipoPlantilla" name="tipoPlantilla" value="">
            <input type="hidden" id="IDPlantilla" name="IDPlantilla">
          </div>
          <div id="campanaPersonalizada" style="display: block;">
            <div class="form-group">
              <label for="nombreCampana">Nombre de la Campaña:</label>
              <input type="text" class="form-control" id="nombreCampana" name="nombreCampana" required>
            </div>
            <div class="form-group">
              <label for="descripcionCampana">Descripción:</label>
              <textarea class="form-control" id="descripcionCampana" name="descripcionCampana" required></textarea>
            </div>
            <div class="form-group">
              <label for="asuntoCorreo">Asunto del Correo:</label>
              <input type="text" class="form-control" id="asuntoCorreo" name="asuntoCorreo">
            </div>
            <div class="form-group">
              <label for="cuerpoCorreo">Cuerpo del Correo:</label>
              <textarea class="form-control" id="cuerpoCorreo" name="cuerpoCorreo"></textarea>
            </div>
            <div class="form-group">
              <label for="logoImagen">Subir Logo:</label>
              <input type="file" class="form-control-file" id="logoImagen" name="logoImagen" accept="image/*">
            </div>
          </div>
          <div id="campanaMaquetado" style="display: none;">
            <div class="form-group">
              <label>Ejemplos de Campañas:</label>
              <select class="form-control" id="ejemploCampana" name="ejemploCampana">
                <?php foreach (obtenerPlantillasCorreo($conn) as $plantilla) : ?>
                  <option value="<?php echo $plantilla['IDPlantilla']; ?>">
                    <?php echo $plantilla['Nombre']; ?>
                  </option>
                <?php endforeach; ?>
              </select>
            </div>
          </div>
          <!-- Selector para el método de ingreso de correos -->
          <div class="form-group">
            <label for="metodoIngresoCorreos">Método de Ingreso de Correos:</label>
            <select class="form-control" id="metodoIngresoCorreos" name="metodoIngresoCorreos">
              <option value="manual">Manual</option>
              <option value="csv">CSV</option>
            </select>
          </div>

          <!-- Campo para ingreso manual de correos -->
          <div id="campoCorreosManual" style="display:none;">
            <div class="form-group">
              <label for="correosUnicos">Correos (separados por comas):</label>
              <input type="text" class="form-control" id="correosUnicos" name="correosUnicos">
            </div>
          </div>

          <!-- Campo para la carga de archivo CSV -->
          <div id="campoArchivoCSV" style="display:none;">
            <div class="form-group">
              <label for="archivoCSV">Subir archivo CSV con correos:</label>
              <input type="file" class="form-control-file" id="archivoCSV" name="archivoCSV" accept=".csv">
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            <button type="submit" class="btn btn-primary">Guardar Campaña</button>
          </div>
      </form>
    </div>
  </div>
</div>