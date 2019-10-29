<div class="modal fade" id="editProducto" tabindex="-1" role="dialog" aria-labelledby="editProductoLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <form method="post">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="editProductoLabel">Actualizar datos del producto</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <div class="input-group mb-3">
                <input type="hidden" class="form-control" id="idProductoEdit" name="idProductoEdit" readonly>
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">CP</span>
                </div>
                <select class="form-control" id="idCategoriaProductoEdit" name="idCategoriaProductoEdit" required>       
                    <?php
                        $categorias = ControladorCategoria::get();
                        foreach ($categorias as $categoria){
                            echo '<option value="'.$categoria["id"].'"> '.$categoria["nombre"].'</option>';
                        }
                    ?>
                </select>
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">NP</span>
                </div>
                <input type="text" class="form-control" placeholder="Nombre del producto" id="nombreEdit" name="nombreEdit" required>
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">$</span>
                </div>
                <input type="text" class="form-control" placeholder="Precio del producto" id="precioEdit" name="precioEdit" required>
            </div>
        </div>
            <?php 
                $actualizarProducto = new ControladorProductos();
                $actualizarProducto->update();
            ?>
        <div class="modal-footer">
            <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Guardar</button>
        </div>
        </div>
    </form>
  </div>
</div>