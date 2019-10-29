<div class="modal fade" id="createProducto" tabindex="-1" role="dialog" aria-labelledby="createProductoLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <form method="post">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="createProductoLabel">Registrar nuevo producto</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">CP</span>
                </div>
                <select class="form-control" name="categoriaProducto" required>
                    <option>Seleccione categoria</option>
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
                <input type="text" class="form-control" placeholder="Nombre del producto" name="nombre" required>
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">$</span>
                </div>
                <input type="text" class="form-control" placeholder="Precio del producto" name="precio" required>
            </div>
        </div>
            <?php 
                $registrarProducto = new ControladorProductos();
                $registrarProducto->create();
            ?>
        <div class="modal-footer">
            <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Guardar</button>
        </div>
        </div>
    </form>
  </div>
</div>