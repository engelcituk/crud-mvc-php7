<div class="modal fade" id="editUsuario" tabindex="-1" role="dialog" aria-labelledby="editUsuarioLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
  <form method="post">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="createCategoriaLabel">Actualizar datos del usuario</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <div class="input-group mb-3">
                <input type="hidden" class="form-control" id="idUsuarioEdit" name="idUsuarioEdit" readonly>
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">NC</span>
                </div>
                <input type="text" class="form-control" placeholder="nombre completo" id="nombreEdit" name="nombreEdit" required>
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">U</span>
                </div>
                <input type="text" class="form-control" placeholder="nombre de usuario" id="usernameEdit" name="usernameEdit" required>
            </div>
            <div class="input-group mb-3">
                <input type="hidden" class="form-control" placeholder="contraseña" id="passwordOriginalEdit" name="passwordOriginalEdit" required>
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">PW</span>
                </div>
                <input type="password" class="form-control" placeholder="contraseña" id="passNuevoEdit" name="passNuevoEdit">
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1"></span>
                </div>
                <div class="form-check">
                    <label class="form-check-label">
                        <input class="form-check-input" type="checkbox" id="estadoEdit" name="estadoEdit" value="1"> Cambiar estado
                        <span class="form-check-sign">
                            <span class="check"></span>
                        </span>
                    </label>
                </div>
            </div>
            
        </div>
            <?php 
                $registrarCategoria = new ControladorUsuarios();
                $registrarCategoria->update();
            ?>
        <div class="modal-footer">
            <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Guardar</button>
        </div>
        </div>
    </form>
  </div>
</div>