<?php

class ControladorAdmin{

	static public function ctrLogin($username_email, $Password){

		$tabla = "app_admin";
		$item = "email";
		$valor = $username_email;

		$respuesta = ModeloAdmin::mdlVerAdmin($tabla, $item, $valor);

		$encriptarPassword = crypt($Password, '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');

		if(($respuesta["email"] == $username_email || $respuesta["username"] == $username_email) && $respuesta["password"] == $encriptarPassword){

			if ($respuesta["status_admin"] == 1) {

				$_SESSION["validarIngreso"] = "acceso concedido";
				$_SESSION["idAdmin"] = $respuesta["idAdmin"];
				$_SESSION["name"] = $respuesta["name"];
				$_SESSION["lastname"] = $respuesta["lastname"];
				$_SESSION["status_admin"] = $respuesta["status_admin"];
				$_SESSION["username"] = $respuesta["username"];
				$_SESSION["loginEmail"] = $respuesta["email"];
				$_SESSION["cambio_password"] = $respuesta["change_password"];

				if ($respuesta['change_password'] == 0) {
					return 'Cambio';
				}else{
					return 'ok';
				}

			}else{
				return 'Error: status';
			}

		}else{
		
			return 'Error: datos';
		}
	}

	/*---------- Fin de ControladorFormularios ---------- */
}