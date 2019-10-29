<?php

require_once "conexion.php";

class ModeloUsuarios{ 

    /*=============================================
	FUNCION PARA CONSULTAR LA LISTA DE USUARIOS 
	=============================================*/
	static public function get($tabla){
		
		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");		

		$stmt -> execute();

		return $stmt->fetchAll();

		$stmt -> close();

		$stmt = null;
	}
	/*=============================================
	PARA VALIDAR QUE NO SE REPITA NOMBRES DE USUARIO (username)
	=============================================*/
	static public function validarNombreDeUsuario($tabla, $usernameDato){

		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE username=:username");

		$stmt->bindParam(":username", $usernameDato, PDO::PARAM_STR);

		$stmt -> execute();
		//retornamos un fecht por ser solo un registro
		return $stmt->fetch();

		$stmt-> close();

		$stmt = null;

	}
	/*=============================================
	PARA EL REGISTRO DE UN NUEVO USUARIO
	=============================================*/
	static public function create($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (id, nombreCompleto, username, password, estado) VALUES (NULL, :nombre, :username, :pass, :estado)");

		$stmt -> bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
		$stmt -> bindParam(":username", $datos["username"], PDO::PARAM_STR);
		$stmt -> bindParam(":pass", $datos["pass"], PDO::PARAM_STR);
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
	 PARA ELIMINAR UN USUARIO DE ACUERDO A SU ID
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
	 PARA OBTENER LOS DATOS DEL USUARIOPOR SU ID
	=============================================*/
	static public function getUserById($tabla,$idCategoria){
 
		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE id = :idCategoria");

		$stmt -> bindParam(":idCategoria", $idCategoria, PDO::PARAM_INT);

		$stmt ->execute();

		return $stmt->fetch();

		$stmt-> close();

		$stmt = null;
	}
	/*=============================================
	PARA GUARDAR LOS DATOS AL EDITAR EL USUARIO DENTRO DEL MODAL
	=============================================*/
	static public function update($tabla, $datos){

	$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET nombreCompleto=:nombre, username=:username, password=:pass, estado=:estado WHERE id=:idUsuario");
			
		$stmt->bindParam(":idUsuario", $datos["idUsuario"], PDO::PARAM_INT);
		$stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
		$stmt->bindParam(":username", $datos["username"], PDO::PARAM_STR);
		$stmt->bindParam(":pass", $datos["pass"], PDO::PARAM_STR);	
		$stmt->bindParam(":estado", $datos["estado"], PDO::PARAM_INT);		

		if ($stmt->execute()) {
			
			return "OK";
		}else {
			return "ERROR";
		}

		$stmt-> close();

		$stmt = null;
	}
	/*=============================================
	PARA EL LOGIN DE UN USUARIO
	=============================================*/
	static public function loginUsuario($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE username = :username AND password=:password");

		$stmt->bindParam(":username", $datos["username"], PDO::PARAM_STR);
		$stmt->bindParam(":password", $datos["password"], PDO::PARAM_STR);

		$stmt -> execute();
		//retornamos un fecht por ser solo un registro
		return $stmt->fetch();

		$stmt-> close();

		$stmt = null;

	}

}