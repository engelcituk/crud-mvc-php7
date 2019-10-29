<div class="modal fade" id="createCategoria" tabindex="-1" role="dialog" aria-labelledby="createCategoriaLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <form method="post">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="createCategoriaLabel">Registrar nueva categoría</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1">CT</span>
            </div>
            <input type="text" class="form-control" placeholder="Categoria" name="nombre" required>
            </div>
        </div>
            <?php 
                $registrarCategoria = new ControladorCategoria();
                $registrarCategoria->create();
            ?>
        <div class="modal-footer">
            <button type="button" class="btn btn-warning" data-dismiss="modal">Cerrar</button>
            <button type="submit" class="btn btn-primary">Guardar</button>
        </div>
        </div>
    </form>
  </div>
</div>