<?php 
//se requiere el controlador y el modelo para obtener respuesta
require_once "../controladores/categorias.controlador.php";
require_once "../modelos/categorias.modelo.php";

class AjaxCategorias{

/*======================================
= PARA OBTENER LOS DATOS DE UNA CATEGORIA =
======================================*/
	public $idCategoria;
	public function getInfoCategory(){

	$tabla = "categorias"; 
	$idCategoria = $this->idCategoria;

	$respuesta = ModeloCategorias::getCategoryById($tabla,$idCategoria); 

	echo json_encode($respuesta);
	}
}

/*======================================
= OBJETO CATEGORIA =
======================================*/
if(isset($_POST["idCategoria"])){
	$categoria = new AjaxCategorias();
	$categoria->idCategoria = $_POST["idCategoria"];
	$categoria->getInfoCategory(); 
}




