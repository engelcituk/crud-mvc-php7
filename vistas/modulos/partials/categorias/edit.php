<div class="modal fade" id="editCategoria" tabindex="-1" role="dialog" aria-labelledby="editCategoriaLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <form method="post">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="editCategoriaLabel">Modificar datos de la categoria</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <div class="input-group mb-3">
                <input type="hidden" class="form-control" id="idCategoriaEdit" name="idCategoriaEdit" readonly>
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">C</span>
                </div>
                <input type="text" class="form-control" id="nombreCategoriaEdit" name="nombreEdit" required>
            </div>
        </div>
            <?php 
                $actualizarCategoria = new ControladorCategoria();
                $actualizarCategoria->update();
            ?>
        <div class="modal-footer">
            <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Guardar</button>
        </div>
        </div>
    </form>
  </div>
</div>