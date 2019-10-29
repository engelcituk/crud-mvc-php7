<?php

require_once "conexion.php";

class ModeloCategorias{ 

    /*=============================================
	FUNCION PARA CONSULTAR LA LISTA DE CATEGORIAS 
	=============================================*/
	static public function get($tabla){
		
		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");		

		$stmt -> execute();

		return $stmt -> fetchAll();

		$stmt -> close();

		$stmt = null;
	}
	/*=============================================
	PARA EL REGISTRO DE UNA CATEGORIA
	=============================================*/
	static public function create($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (nombre,estado) VALUES (:nombre, :estado)");

		$stmt -> bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
		$stmt -> bindParam(":estado", $datos["estado"], PDO::PARAM_INT);
		
		if ($stmt->execute()) {
			
			return "OK";
		}else {
			return "ERROR";
		}
		$stmt-> close();

		$stmt = null;
	}
	/*=============================================
	 PARA ELIMINAR una categoria
	=============================================*/

	static public function delete($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id = :id");

		$stmt->bindParam(":id", $datos, PDO::PARAM_INT);

		if ($stmt->execute()) {
			return "OK";
		} else {
			return "ERROR";
		}

		$stmt->close();

		$stmt = null;
	}

	/*=============================================
	 PARA OBTENER LOS DATOS DE LA CATEGORIA
	=============================================*/
	
	static public function getCategoryById($tabla,$idCategoria){
 
		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE id = :idCategoria");

		$stmt -> bindParam(":idCategoria", $idCategoria, PDO::PARAM_INT);

		$stmt ->execute();

		return $stmt->fetch();

		$stmt-> close();

		$stmt = null;
	}
	/*=============================================
	PARA GUARDAR LOS DATOS AL EDITAR LA CATEGORIA DENTRO DEL MODAL
	=============================================*/
	static public function update($tabla, $datos){

	$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET nombre = :nombre WHERE id = :idCategoria");


		$stmt -> bindParam(":idCategoria", $datos["idCategoria"], PDO::PARAM_INT);
		$stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);		

		if ($stmt->execute()) {
			
			return "OK";
		}else {
			return "ERROR";
		}

		$stmt-> close();

		$stmt = null;
	}


}