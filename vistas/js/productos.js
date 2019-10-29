$(document).ready(function() {
    $('#tblProductos').DataTable({
        "pagingType": "full_numbers",
        "lengthMenu": [
            [5, 10, 25, 50, -1],
            [5, 10, 25, 50, "Todos"]
        ],
        responsive: true,
        language: {
            sLengthMenu: "Mostrar _MENU_ registros",
            processing: "Procesando",
            search: "_INPUT_",
            searchPlaceholder: "Buscar registros",
            sInfo: "Mostrando _START_ registro(s) a _END_ de un total de _TOTAL_ registros",
            oPaginate: {
                "sFirst": "Primero",
                "sLast": "Último",
                "sNext": "Siguiente",
                "sPrevious": "Anterior"
            }
        }
    });
});


function editProducto(idProducto) {

    var datos = new FormData();
    datos.append("idProducto", idProducto);

    $.ajax({
        url: "ajax/productos.ajax.php", //enviamos a este archivo el id para que lo procese
        method: "POST", //el envio es por POST
        data: datos, //datos es la instancia de ajax por el que se envia el id
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json", //los datos son de tipo json
        success: function(respuesta) {
            //console.log(respuesta);
            //abro la ventana modal
            $("#editProducto").modal()
                //pongo en los campos del modal los valores
            $("#idProductoEdit").val(idProducto);
            $("#idCategoriaProductoEdit").val(respuesta["idCategoria"]);
            $("#nombreEdit").val(respuesta["nombreProducto"]);
            $("#precioEdit").val(respuesta["precio"]);

        }
    })

}

function deleteProducto(idProducto) {

    Swal.fire({
        title: 'Estas seguro?',
        text: "No se podrá revertir la eliminación!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Sí,  borrarlo!',
        cancelButtonText: '!Cancelar!'
    }).then((result) => {
        if (result.value) {
            $.ajax({
                url: "productos",
                type: "POST",
                data: {
                    idProducto: idProducto
                },
                dataType: "html",
                success: function(respuesta) {
                    swal({
                        title: "Exito!",
                        text: "¡Su dato ha sido borrado exitosamente!",
                        type: "success",
                        confirmButtonText: "Cerrar",
                        preConfirm: false
                    }).then(function(isConfirm) {
                        if (isConfirm) {
                            location.reload();
                        }
                    });
                },
                error: function(xhr, ajaxOptions, thrownError) {
                    swal({
                        title: "Ocurrió un error!",
                        text: "¡Por favor intente de nuevo!",
                        type: "error",
                        confirmButtonText: "Cerrar",
                        preConfirm: false
                    }).then(function(isConfirm) {
                        if (isConfirm) {
                            location.reload();
                        }
                    });
                }
            });
        }
    });
}