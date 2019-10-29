<div class="row">
    <div class="col-md-12">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#createProducto">
            Nuevo producto
        </button>
        <div class="card ">
            <div class="card-header card-header-success card-header-icon">
                <div class="card-icon">
                    <i class="fas fa-list"></i>
                </div>
                <h4 class="card-title">Productos</h4>
            </div>
            <div class="card-body ">
                <div class="row">
                    <div class="col-md-12"> 
                        <div class="material-datatables">
                            <table id="tblProductos" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                            <thead>
                                <tr>
                                <th>ID</th>
                                <th>Categoria</th>
                                <th>Nombre producto</th>
                                <th>Precio</th>
                                <th>Acciones</th>
                                
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>ID</th>
                                    <th>Categoria</th>
                                    <th>Nombre producto</th>
                                    <th>Precio</th>
                                    <th>Acciones</th>
                                </tr>
                            </tfoot>
                                <tbody>
                                    <?php
                                        $productos = ControladorProductos::get();
                                        
                                        foreach ($productos as $producto){
                                            echo 
                                            '<tr>
                                                <td>'.$producto["idProducto"].'</td>
                                                <td>'.$producto["nombreCategoria"].'</td>
                                                <td>'.$producto["nombreProducto"].'</td>
                                                <td>'.$producto["precio"].'</td>
                                                <td>
                                                    <button class="btn btn-info" onclick="editProducto('.$producto["idProducto"].')"><i class="fas fa-edit"></i> </button>
                                                    <button class="btn btn-danger" onclick="deleteProducto('.$producto["idProducto"].')"><i class="fas fa-trash"></i> </button>
                                                </td>
                                            </tr>';
                                        }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
    include "partials/productos/create.php";
    include "partials/productos/edit.php";
    
    $deleteProducto = new ControladorProductos();
    $deleteProducto->delete();

    ?>
</div>

