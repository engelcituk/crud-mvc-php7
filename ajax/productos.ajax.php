<?php 
//se requiere el controlador y el modelo para obtener respuesta
require_once "../controladores/productos.controlador.php";
require_once "../modelos/productos.modelo.php";


class AjaxProductos{

/*======================================
= para obtener los datos del producto  =
======================================*/
	public $idProducto;
	public function getInfoProduct(){

    $tabla = "productos";
    $tabla2="categorias";
	$idProducto = $this->idProducto;

	$respuesta = ModeloProductos::getProductById($tabla,$tabla2,$idProducto); //(id, 7) como parametros para ejecutar

	echo json_encode($respuesta);
	}
}

/*======================================
= OBJETO producto =
======================================*/
if(isset($_POST["idProducto"])){
	$producto = new AjaxProductos();
	$producto->idProducto = $_POST["idProducto"];
	$producto->getInfoProduct(); 
}




