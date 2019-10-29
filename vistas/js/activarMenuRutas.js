activarMenuDelSistema();

function activarMenuDelSistema() {

    let stringNombreRuta = window.location.pathname;
    separador = "/";
    textoSeparado = stringNombreRuta.split(separador);
    ultimoStringRuta = textoSeparado[2];

    switch (ultimoStringRuta) {
        case 'inicio':
            ruta = ultimoStringRuta;
            $('#listaInicio').addClass('active')
            break;
        case 'categorias':
            ruta = ultimoStringRuta;
            $('#listaCategorias').addClass('active')
            $('#paginasCrud').addClass('show');
            break;
        case 'productos':
            ruta = ultimoStringRuta;
            $('#listaProductos').addClass('active');
            $('#paginasCrud').addClass('show');
            break;
        case 'usuarios':
            ruta = ultimoStringRuta;
            $('#listaUsuarios').addClass('active');
            $('#paginasCrud').addClass('show');
            break;
        default:
            ruta = "Ruta No Existe"
            break;
    }
}