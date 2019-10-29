$(document).ready(function() {
    $('#tblCategorias').DataTable({
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
/*=============================================
	FUNCION PARA EDITAR LA CATEGORIA
=============================================*/

function editCategoria(idCategoria) {

    var datos = new FormData();
    datos.append("idCategoria", idCategoria);

    $.ajax({
        url: "ajax/categorias.ajax.php", //enviamos a este archivo el id para que lo procese
        method: "POST", //el envio es por POST
        data: datos, //datos es la instancia de ajax por el que se envia el id
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json", //los datos son de tipo json
        success: function(respuesta) {
            //console.log(respuesta);
            //abro la ventana modal
            $("#editCategoria").modal()
                //pongo en los campos del modal los valores 
            $("#idCategoriaEdit").val(idCategoria);
            $("#nombreCategoriaEdit").val(respuesta["nombre"]);
        }
    })

}

/*=============================================
	FUNCION PARA ELIMINAR LA CATEGORIA
=============================================*/

function deleteCategoria(idCategoria) {

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
                url: "categorias",
                type: "POST",
                data: {
                    idCategoria: idCategoria
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