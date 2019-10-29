$(document).ready(function() {
    $('#tblUsuarios').DataTable({
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

function validarUsername() {

    $(".alert").remove(); //si cambia el input, si hay mensajes de alerta, estas se remueven
    var userName = $('#nombreUsuario').val();

    var datos = new FormData();
    datos.append("username", userName);

    $.ajax({
        url: "ajax/usuarios.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json", //los datos son de tipo json
        success: function(respuesta) { //obtengo una respuesta tipo json			
            //console.log("respuesta", respuesta);
            if (respuesta) { //si respuesta es true (si me trae resultados)..//coloco una alerta
                $("#mnsjUsuarioValido").after('<div class="alert alert-warning"><strong>Este ussuario!</strong> Ya existe en la base de datos, intente con otro nombre de usuario.</div>');
                $("#nombreUsuario").val(""); //inmediatamente limpiamos el campo del usernmame
                $("#nombreUsuario").focus(); // le ponemos el cursor ahi
            } else {
                $("#mnsjUsuarioValido").after('<div class="alert alert-success"><strong>¡Usuario válido!</strong></div>');
            }
        }
    });
}

function editUsuario(idUsuario) {

    var datos = new FormData();
    datos.append("idUsuario", idUsuario);

    $.ajax({
        url: "ajax/usuarios.ajax.php", //enviamos a este archivo el id para que lo procese
        method: "POST", //el envio es por POST
        data: datos, //datos es la instancia de ajax por el que se envia el id
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json", //los datos son de tipo json
        success: function(respuesta) {
            //console.log(respuesta);
            //abro la ventana modal
            $("#editUsuario").modal()
                //pongo en los campos del modal los valores
            var estado = respuesta["estado"];
            var checked = (estado == 1 ? true : false); //operador ternario

            $("#idUsuarioEdit").val(idUsuario);
            $("#nombreEdit").val(respuesta["nombreCompleto"]);
            $("#usernameEdit").val(respuesta["username"]);
            $("#passwordOriginalEdit").val(respuesta["password"]);
            $("#passwordOriginalEdit").val(respuesta["password"]);
            $("#passNuevoEdit").val("");
            $("#estadoEdit").prop('checked', checked);


        }
    })
}

function deleteUsuario(idUsuario) {

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
                url: "usuarios",
                type: "POST",
                data: {
                    idUsuario: idUsuario
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