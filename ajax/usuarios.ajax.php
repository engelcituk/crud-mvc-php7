<?php 
//se requiere el controlador y el modelo para obtener respuesta
require_once "../controladores/usuarios.controlador.php";
require_once "../modelos/usuarios.modelo.php";


class AjaxUsuarios{

	/*======================================
	= VALIDAR NO REPETIR A UN USUARIO    =
	======================================*/
	public $username;
	public function validarNombreDeUsuario(){

		$tabla = "usuarios"; 
		$usernameDato = $this->username; 
		$respuesta = ModeloUsuarios::validarNombreDeUsuario($tabla, $usernameDato);
		
		echo json_encode($respuesta);

	}

	/*======================================
	= OBTENER LOS DATOS DEL USUARIO POR SU ID =
	======================================*/
	public $idUsuario;
	public function getInfoUser(){

    $tabla = "usuarios";
	$idUsuario = $this->idUsuario;

	$respuesta = ModeloUsuarios::getUserById($tabla,$idUsuario); //parametros para ejecutar

	echo json_encode($respuesta);
	}

}

/*======================================
= OBJETO-->VALIDAR NOMBRE DE USUARIO =
======================================*/
if(isset($_POST["username"])){

	$usuario = new AjaxUsuarios();
	$usuario->username = $_POST["username"]; 
	$usuario->validarNombreDeUsuario();
}
/*======================================
= OBJETO->OBTENER LOS DATOS DEL USUARIO POR SU ID =
======================================*/
if(isset($_POST["idUsuario"])){
	$usuario = new AjaxUsuarios();
	$usuario->idUsuario = $_POST["idUsuario"];
	$usuario->getInfoUser(); 
}






