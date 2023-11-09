<?php 

include_once 'models/models.php';

class ControllerApi{

	static public function titles($item, $value){
		$resultados = ModelsApi::titles($item, $value);
	    if (!empty($resultados)) {
	        
			$datos = array();
			
	        if ($item != null && $value != null) {
		        foreach ($resultados as $fila) {
		            $capituloId = intval($fila['idChapters']);
		            $seccionId = intval($fila['idSections']);
		            $articuloId = intval($fila['idArticles']);
		            $parrafoId = intval($fila['idParagraph']);

		            // Agrupa los datos por título, capítulo, sección, artículo y párrafo.
		            $resultado['idTitles'] = intval($fila['idTitles']);
		            $resultado['name_title'] = $fila['name_title'];
		            $resultado['status_title'] = intval($fila['status_title']);
		            $resultado['type_title'] = $fila['type_title'];
		            $resultado['Admin_idAdmin'] = intval($fila['Admin_idAdmin']);
	                $resultado['idCover'] = intval($fila['idCover']);
	                $resultado['cover_name'] = $fila['cover_name'];

		            if ($capituloId && $fila['chapter_title'] == $fila['idTitles']) {
		                $resultado['chapters'][]['name_Chapter'] = $fila['name_Chapter'];

		                if ($seccionId && $fila['section_chapter'] == $fila['idChapters']) {
		                    $resultado['chapters'][]['sections'][$seccionId]['name_section'] = $fila['name_section'];

		                    if ($articuloId && $fila['articles_section'] == $fila['idSections']) {
		                        $resultado['chapters'][]['sections'][$seccionId]['articles'][$articuloId]['name_article'] = $fila['name_article'];

		                        if ($parrafoId && $fila['paragraph_articles'] == $fila['idArticles']) {
		                            $resultado['chapters'][]['sections'][$seccionId]['articles'][$articuloId]['paragraph'][$parrafoId] = array(
		                                'paragraph' => $fila['paragraph'],
		                                'position' => $fila['position']
		                            );
		                        }
		                    }
		                }
		                if ($articuloId && ($fila['articles_chapter'] == $fila['idChapters'] && $fila['articles_section'] == 0 )){
		                	$resultado['chapters'][]['articles'][$articuloId]['name_article'] = $fila['name_article'];

	                        if ($parrafoId && $fila['paragraph_articles'] == $fila['idArticles']) {
	                            $resultado['chapters'][]['sections']['articles'][$articuloId]['paragraph'][$parrafoId] = array(
	                                'paragraph' => $fila['paragraph'],
	                                'position' => $fila['position']
	                            );
	                        }
		                }
			        }
					
		        }
					$datos[] = $resultado;
	            echo json_encode($datos, JSON_PRETTY_PRINT);
		    } else{
				
				foreach ($resultados as $fila) {
					// Agrega la información de la portada a la lista de resultados.
					$resultado = array(
						"idTitles" => intval($fila['idTitles']),
						"name_title" => $fila['name_title'],
						"idCover" => intval($fila['idCover']),
						"cover_name" => $fila['cover_name']
					);
				
					$datos['results'][] = $resultado;
				}
				
				echo json_encode($datos, JSON_PRETTY_PRINT);
				
		    }
		} else {
            echo json_encode(array('mensaje' => 'No se encontraron registros de títulos.'), JSON_PRETTY_PRINT);
	    }
	}
	static public function createUser($name, $email, $password) {

        if (!isValidName($name)) {
            return json_encode(['message' => 'El nombre no es válido']);
        } elseif (!isValidEmail($email)) {
            return json_encode(['message' => 'El correo electrónico no es válido']);
        } elseif (!isValidPassword($password)) {
            return json_encode(['message' => 'La contraseña no cumple con los requisitos']);
        } else {
            // Contraseña válida, encripta la contraseña con crypt
            $salt = '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$';
            $hashedPassword = crypt($password, $salt);

            $registro = ModelsApi::createUser($name, $email, $hashedPassword);

            // Devuelve una respuesta JSON
            return json_encode(['message' => $registro]);
        }
    }

	static public function loginUser($email, $password) {
		$datos = array();
	
		// Verificar si el usuario con el correo electrónico existe en la base de datos
		$usuario = ModelsApi::getUserByEmail($email);
	
		if ($usuario) {
			// Verificar si la contraseña proporcionada coincide con la almacenada en la base de datos
			$salt = '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$';
			$hashedPassword = crypt($password, $salt);
			
			if ($usuario['password'] === $hashedPassword) {
				if ($usuario['status_user'] == 1){
					if ($usuario['attempts'] < 3) {
						// Contraseña válida, el usuario está autenticado
						$datos = [
							"idUser" => intval($usuario['idUsers']),
							"firstname" => $usuario['name'],
							"lastname" => $usuario['lastname'] ?? '',
							"birthday" => $usuario['birthday'] ?? '',
							"email" => $usuario['email'],
							"phone" => $usuario['phone'] ?? '',
							"creationDate" => $usuario['creation_date'],
							"message" => "Inicio exitoso"
						];
					} else {
						$datos= array(
							"idUser" => intval(0),
							"firstname" => '',
							"lastname" => '',
							"birthday" => '',
							"email" => '',
							"phone" => '',
							"creationDate" => '',
							"message" => "Cuenta suspendida");
					}
				} else {
					$datos = array(
						"idUser" => intval(0),
						"firstname" => '',
						"lastname" => '',
						"birthday" => '',
						"email" => '',
						"phone" => '',
						"creationDate" => '',
						"message" => "Cuenta eliminada");
				}
			} else {
				// Contraseña incorrecta
				$datos = array(
					"idUser" => intval(0),
					"firstname" => '',
					"lastname" => '',
					"birthday" => '',
					"email" => '',
					"phone" => '',
					"creationDate" => '',
					"message" => "Contraseña incorrecta");
			}
		} else {
			// Usuario no encontrado
			$datos = array(
				"idUser" => intval(0),
				"firstname" => '',
				"lastname" => '',
				"birthday" => '',
				"email" => '',
				"phone" => '',
				"creationDate" => '',
				"message" => "Usuario no encontrado");
		}
	
		return json_encode($datos);
	}

	static public function loadData($email) {
		$datos = array();
	
		// Verificar si el usuario con el correo electrónico existe en la base de datos
		$usuario = ModelsApi::getUserByEmail($email);
	
		if ($usuario) {
				if ($usuario['status_user'] == 1){
					if ($usuario['attempts'] < 3) {
						// Contraseña válida, el usuario está autenticado
						$datos = [
							"idUser" => intval($usuario['idUsers']),
							"firstname" => $usuario['name'],
							"lastname" => $usuario['lastname'] ?? '',
							"birthday" => $usuario['birthday'] ?? '',
							"email" => $usuario['email'],
							"phone" => $usuario['phone'] ?? '',
							"creationDate" => $usuario['creation_date'],
							"message" => "Inicio exitoso"
						];
					} else {
						$datos= array(
							"idUser" => intval(0),
							"firstname" => '',
							"lastname" => '',
							"birthday" => '',
							"email" => '',
							"phone" => '',
							"creationDate" => '',
							"message" => "Cuenta suspendida");
					}
				} else {
					$datos = array(
						"idUser" => intval(0),
						"firstname" => '',
						"lastname" => '',
						"birthday" => '',
						"email" => '',
						"phone" => '',
						"creationDate" => '',
						"message" => "Cuenta eliminada");
				}
		} else {
			// Usuario no encontrado
			$datos = array(
				"idUser" => intval(0),
				"firstname" => '',
				"lastname" => '',
				"birthday" => '',
				"email" => '',
				"phone" => '',
				"creationDate" => '',
				"message" => "Usuario no encontrado");
		}
		return json_encode($datos);
	}
}


// Función para verificar si el nombre es válido
function isValidName($name) {
	return preg_match('/^[A-Za-z\s]+$/', $name);
}

// Función para verificar si el correo es válido
function isValidEmail($email) {
	return filter_var($email, FILTER_VALIDATE_EMAIL);
}

// Función para verificar si el password cumple con los requisitos
function isValidPassword($password) {
	return preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).{8,}$/', $password);
}