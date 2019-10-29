<div class="row">
    <div class="col-md-12">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#createUser">
            Nuevo usuario
        </button>
        <div class="card ">
            <div class="card-header card-header-success card-header-icon">
                <div class="card-icon">
                    <i class="fas fa-list"></i>
                </div>
                <h4 class="card-title">Usuarios</h4>
                
            </div>
            <div class="card-body ">
                <div class="row">
                    <div class="col-md-12"> 
                        <div class="material-datatables">
                            <table id="tblUsuarios" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                            <thead>
                                <tr>
                                <th>ID</th>
                                <th>Nombre</th>
                                <th>Username</th>
                                <th>Estado</th>
                                <th>Acciones</th>
                                
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>ID</th>
                                    <th>Nombre</th>
                                    <th>Username</th>
                                    <th>Estado</th>
                                    <th>Acciones</th>
                                </tr>
                            </tfoot>
                                <tbody>
                                    <?php
                                        $usuarios = ControladorUsuarios::get();
                                        foreach ($usuarios as $usuario){
                                            $estado = ($usuario["estado"] == 1) ? 
                                                '<span class="badge badge-success">Activo</span> ':
                                                '<span class="badge badge-danger">Desactivado</span>';
                                            echo 
                                            '<tr>
                                                <td>'.$usuario["id"].'</td>
                                                <td>'.$usuario["nombreCompleto"].'</td>
                                                <td>'.$usuario["username"].'</td>
                                                <td>'.$estado.'</td>
                                                <td>
                                                    <button class="btn btn-info" onclick="editUsuario('.$usuario["id"].')"><i class="fas fa-edit"></i> </button>
                                                    <button class="btn btn-danger" onclick="deleteUsuario('.$usuario["id"].')"><i class="fas fa-trash"></i> </button>
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
    include "partials/usuarios/create.php";
    include "partials/usuarios/edit.php";

    $deleteUsuario = new ControladorUsuarios();
    $deleteUsuario->delete();

    ?>
</div>

