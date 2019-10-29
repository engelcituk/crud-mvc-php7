<div class="modal fade" id="createUser" tabindex="-1" role="dialog" aria-labelledby="createUserLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
  <form method="post">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="createCategoriaLabel">Registrar nuevo usuario</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1">NC</span>
            </div>
            <input type="text" class="form-control" placeholder="nombre completo" name="nombre" required>
        </div>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1">UN</span>
            </div>
            <input type="text" class="form-control" placeholder="nombre de usuario" id="nombreUsuario" name="username" onchange="validarUsername()" required>
        </div>
        <br><div id="mnsjUsuarioValido"></div>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1">PW</span>
            </div>
            <input type="password" class="form-control" placeholder="contraseña" name="pass" required>
        </div>
        </div>
            <?php 
                $registrarCategoria = new ControladorUsuarios();
                $registrarCategoria->create();
            ?>
        <div class="modal-footer">
            <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Guardar</button>
        </div>
        </div>
    </form>
  </div>
</div>