<!-- Modal Editar Información -->
<div class="modal fade" id="editarInfoModal" tabindex="-1" role="dialog" aria-labelledby="editarInfoModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editarInfoModalLabel">Editar Información Personal</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="editarInfoForm">
        <div class="modal-body">
          <div class="form-group">
            <label for="nombre">Nombre</label>
            <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo htmlspecialchars($userInfo['Nombre']); ?>">
          </div>
          <div class="form-group">
            <label for="direccion">Dirección</label>
            <input type="text" class="form-control" id="direccion" name="direccion" value="<?php echo htmlspecialchars($userInfo['Direccion']); ?>">
          </div>
          <div class="form-group">
            <label for="ciudad">Ciudad</label>
            <input type="text" class="form-control" id="ciudad" name="ciudad" value="<?php echo htmlspecialchars($userInfo['Ciudad']); ?>">
          </div>
          <div class="form-group">
            <label for="pais">País</label>
            <input type="text" class="form-control" id="pais" name="pais" value="<?php echo htmlspecialchars($userInfo['Pais']); ?>">
          </div>
          <div class="form-group">
            <label for="codigoPostal">Código Postal</label>
            <input type="text" class="form-control" id="codigoPostal" name="codigoPostal" value="<?php echo htmlspecialchars($userInfo['CodigoPostal']); ?>">
          </div>
          <div class="form-group">
            <label for="telefono">Teléfono</label>
            <input type="text" class="form-control" id="telefono" name="telefono" value="<?php echo htmlspecialchars($userInfo['Telefono']); ?>">
          </div>
          <input type="hidden" name="idUsuario" value="<?php echo htmlspecialchars($userInfo['ID']); ?>">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
          <button type="submit" class="btn btn-primary">Guardar Cambios</button>
        </div>
      </form>
    </div>
  </div>
</div>
