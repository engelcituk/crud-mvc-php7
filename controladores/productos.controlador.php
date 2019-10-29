<?php

class ControladorProductos{

    /*=============================================
	LISTADO DE productos
	=============================================*/
	public function get(){

		$tabla = "productos";
		
        $respuesta = ModeloProductos::get($tabla);
        
		return $respuesta;		
	}
	
	/*=============================================
	PARA CREAR producto
	=============================================*/
	public function create(){

		if (isset($_POST["categoriaProducto"])) {
			
			$tabla = "productos";
            $datos = array("idCategoria" =>$_POST["categoriaProducto"],
                           "nombre" =>$_POST["nombre"],
						   "precio" => $_POST["precio"]);  
			$respuesta = ModeloProductos::create($tabla, $datos);

			if ($respuesta == "OK"){
				echo '
				<script>
					swal({

						type: "success",
						title: "¡El producto ha sido guardado correctamente!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"

					}).then(function(result){
						if(result.value){
							window.location = "productos";
						}
					});
				</script>';
			}
		}
	}
	
	/*=============================================
	FUNCION PARA ACTUALIZAR EL PRODUCTO 
	=============================================*/
	public function update(){
		
		if (isset($_POST["idProductoEdit"])) {//SI nombre  VIENE LLENO 

			$tabla = "productos";
			
			$datos = array("idProducto" =>$_POST["idProductoEdit"],
						   "idCategoria" =>$_POST["idCategoriaProductoEdit"],
						   "nombre" =>$_POST["nombreEdit"],
						   "precio" =>$_POST["precioEdit"],
						);

			//LLAMO AL MODELO QUE HACE EL UPDATE
			$respuesta = ModeloProductos::update($tabla, $datos);
			if ($respuesta == "OK"){
				echo
				'
				<script>		
					swal({
						title: "¡OK!",
						text: "¡La categoría se ha actualizado exitosamente!",
						type:"success",
						confirmButtonText: "Cerrar",
						preConfirm: false
						}).then(function(isConfirm){
							if(isConfirm){
								history.back();
							}
					});
				</script>	
				';
			}	 
		}		
	}
	/*=============================================
	FUNCION PARA ELIMINAR la producto
	=============================================*/
	public function delete(){
		$ok=false;		
		if (isset($_POST["idProducto"])) {
			$tabla = "productos";			
			$datos = $_POST["idProducto"];			
			//borro la categoría
			$respuesta = ModeloProductos::delete($tabla, $datos);
			if ($respuesta == "OK") {
				$ok=true;	
			}else {
				$ok=false;	
			}
		}
		return json_encode($ok);
	}

}