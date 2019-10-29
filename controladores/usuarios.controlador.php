<?php

class ControladorUsuarios{

    /*=============================================
	PARA OBTENER EL LISTADO DE USUARIOS
	=============================================*/
	public function get(){

		$tabla = "usuarios";
		
        $respuesta = ModeloUsuarios::get($tabla);
        
		return $respuesta;		
	}
	
	/*=============================================
	PARA CREAR A UN NUEVO USUARIO
	=============================================*/
	public function create(){

		if (isset($_POST["nombre"])) {
			
			$tabla = "usuarios";
			$passwordEncriptado = crypt($_POST["pass"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$SuperSal');
			$estado = 1;
			$datos = array("nombre" =>$_POST["nombre"],
						   "username" =>$_POST["username"],
						   "pass" =>$passwordEncriptado,
						   "estado" => $estado);
			$respuesta = ModeloUsuarios::create($tabla, $datos);

			if ($respuesta == "OK"){
				echo '
				<script>
					swal({

						type: "success",
						title: "¡El usuario ha sido guardado correctamente!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"

					}).then(function(result){
						if(result.value){
							window.location = "usuarios";
						}
					});
				</script>';
			}
		}
	}
	
	/*=============================================
	FUNCION PARA ACTUALIZAR A UN USUARIO POR SU ID
	=============================================*/
	public function update(){
		
		if (isset($_POST["idUsuarioEdit"])) {//SI idUsuarioEdit  VIENE CON DATOS 

			$tabla = "usuarios";
			
			if ($_POST["passNuevoEdit"] !="" ) {
				$passwordEncriptado = crypt($_POST["passNuevoEdit"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$SuperSal');
			} else {
				$passwordEncriptado = $_POST["passwordOriginalEdit"];				
			}

			$estado = isset($_POST["estadoEdit"]) ? 1 : 0;
			
			$datos = array( "idUsuario" =>$_POST["idUsuarioEdit"],
							"nombre" =>$_POST["nombreEdit"],
							"username" =>$_POST["usernameEdit"],
							"pass" => $passwordEncriptado,
							"estado" => $estado);
			//LLAMO AL MODELO QUE HACE EL UPDATE
			$respuesta = ModeloUsuarios::update($tabla, $datos);
			if ($respuesta == "OK"){
				echo '
					<script>
						swal({

							type: "success",
							title: "¡El usuario ha sido actualizado correctamente!",
							showConfirmButton: true,
							confirmButtonText: "Cerrar"

						}).then(function(result){
							if(result.value){
								window.location = "usuarios";
							}
						});
					</script>';
			}	 
		}		
	}
	/*=============================================
	FUNCION PARA ELIMINAR A UN USUARIO DE ACUERDO A SU ID
	=============================================*/
	public function delete(){
		$ok=false;		
		if (isset($_POST["idUsuario"])) {
			$tabla = "usuarios";			
			$datos = $_POST["idUsuario"];			
			//borro la categoría
			$respuesta = ModeloUsuarios::delete($tabla, $datos);
			if ($respuesta == "OK") {
				$ok=true;	
			}else {
				$ok=false;	
			}
		}
		return json_encode($ok);
	}
	/*=============================================
	PARA EL LOGIN DEL DE UN USUARIO
	=============================================*/
	static public function loginUsuario(){

		if(isset($_POST["username"])){

			$tabla = "usuarios";
			$username = $_POST["username"];
			$password = crypt($_POST["password"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$SuperSal');
			
			$datos = array( "username" =>$username,
							"password" => $password);
			$respuesta = ModeloUsuarios::loginUsuario($tabla, $datos);

			if($respuesta["username"] == $username && $respuesta["password"] == $password){
				if($respuesta["estado"] == 1){

					$_SESSION["iniciarSesion"] = "ok";
					$_SESSION["idUsuario"] = $respuesta["id"];
					$_SESSION["nombre"] = $respuesta["nombreCompleto"];
					$_SESSION["username"] = $respuesta["username"];
					echo '<script>window.location = "inicio";</script>';
				}else{
					echo '<div class="alert alert-danger">El usuario aún no está activado</div>';
				}		
			}else{
				echo '<div class="alert alert-danger">Datos incorrectos, vuelve a intentarlo</div>';
			}
		}
	}
}