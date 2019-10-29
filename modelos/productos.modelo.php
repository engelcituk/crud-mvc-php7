<?php

require_once "conexion.php";

class ModeloProductos{ 

    /*=============================================
	FUNCION PARA CONSULTAR LA LISTA DE productos 
	=============================================*/
	static public function get($tabla){
		
		$stmt = Conexion::conectar()->prepare("SELECT productos.id AS idProducto, productos.idCategoria AS idCat, categorias.nombre AS nombreCategoria, productos.nombreProducto AS nombreProducto, productos.precio AS precio FROM $tabla INNER JOIN categorias ON productos.idCategoria=categorias.id");		

		$stmt -> execute();

		return $stmt -> fetchAll();

		$stmt -> close();

		$stmt = null;
	}
	/*=============================================
	PARA EL REGISTRO DE producto
	=============================================*/
	static public function create($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (idCategoria,nombreProducto,precio) VALUES (:idCategoria, :nombre, :precio)");

		$stmt -> bindParam(":idCategoria", $datos["idCategoria"], PDO::PARAM_INT);
		$stmt -> bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
		$stmt -> bindParam(":precio", $datos["precio"], PDO::PARAM_STR);

		if ($stmt->execute()) {
			
			return "OK";
		}else {
			return "ERROR";
		}
		$stmt-> close();

		$stmt = null;
	}
	/*=============================================
	 PARA ELIMINAR una producto
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
	 PARA OBTENER LOS DATOS DEL PRODUCTO	
	=============================================*/
	static public function getProductById($tabla,$tabla2,$idProducto){
 
		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla INNER JOIN $tabla2 ON productos.idCategoria=categorias.id WHERE productos.id=:idProducto");

		$stmt -> bindParam(":idProducto", $idProducto, PDO::PARAM_INT);

		$stmt ->execute();

		return $stmt->fetch();

		$stmt-> close();

		$stmt = null;
	}
	/*=============================================
	PARA GUARDAR LOS DATOS AL EDITARL PRODUCTO DENTRO DEL MODAL
	=============================================*/
	static public function update($tabla, $datos){

	$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET idCategoria=:idCategoria, nombreProducto=:nombre, precio=:precio WHERE id = :idProducto");
			
		$stmt->bindParam(":idProducto", $datos["idProducto"], PDO::PARAM_INT);
		$stmt->bindParam(":idCategoria", $datos["idCategoria"], PDO::PARAM_INT);
		$stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
		$stmt->bindParam(":precio", $datos["precio"], PDO::PARAM_STR);		

		if ($stmt->execute()) {
			
			return "OK";
		}else {
			return "ERROR";
		}

		$stmt-> close();

		$stmt = null;
	}


}

