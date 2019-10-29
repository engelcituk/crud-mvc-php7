<?php

class ControladorCategoria{

    /*=============================================
	LISTADO DE CATEGORIAS
	=============================================*/
	public function get(){

        $tabla = "categorias";
        
        $respuesta = ModeloCategorias::get($tabla);
        
        return $respuesta;      
    }

	/*=============================================
	PARA CREAR UNA CATEGORIA
	=============================================*/
	public function create(){

        if (isset($_POST["nombre"])) {
            
            $tabla = "categorias";
            $estado = 1;
            $datos = array("nombre" =>$_POST["nombre"],
                           "estado" => $estado);
            $respuesta = ModeloCategorias::create($tabla, $datos);

            if ($respuesta == "OK"){                
                echo '
                <script>
                    swal({
                        type: "success",
                        title: "¡La categoria ha sido guardado correctamente!",
                        showConfirmButton: true,
                        confirmButtonText: "Cerrar"

                    }).then(function(result){
                        if(result.value){
                            window.location = "categorias";
                        }
                    });
                </script>';
            }
        }
    }

	
	/*=============================================
	FUNCION PARA ACTUALIZAR LA CATEGORÍA
	=============================================*/
	public function update(){
		
		if (isset($_POST["nombreEdit"])) {//SI nombre  VIENE LLENO 

			$tabla = "categorias";
			
			$datos = array("idCategoria" =>$_POST["idCategoriaEdit"],
						   "nombre" =>$_POST["nombreEdit"]);

			//LLAMO AL MODELO QUE HACE EL UPDATE
			$respuesta = ModeloCategorias::update($tabla, $datos);
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
	FUNCION PARA ELIMINAR LA CATEGORIA
	=============================================*/
	
	public function delete(){
		$ok=false;		
		if (isset($_POST["idCategoria"])) {
			$tabla = "categorias";			
			$datos = $_POST["idCategoria"];			
			//borro la categoría
			$respuesta = ModeloCategorias::delete($tabla, $datos);
			if ($respuesta == "OK") {
				$ok=true;	
			}else {
				$ok=false;	
			}
		}
		return json_encode($ok);
	}

}