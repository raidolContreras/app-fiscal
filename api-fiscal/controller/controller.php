<?php 

include_once 'models/models.php';

class ControllerApi{

	static public function titles($item, $value){
		$resultados = ModelsApi::titles($item, $value);
	    if (!empty($resultados)) {
	        
			$datos = array(
				"results" => array()
			);
			
	        if ($item != null && $value != null) {
		        foreach ($resultados as $fila) {
		            $capituloId = intval($fila['idChapters']);
		            $seccionId = intval($fila['idSections']);
		            $articuloId = intval($fila['idArticles']);
		            $parrafoId = intval($fila['idParagraph']);

		            // Agrupa los datos por título, capítulo, sección, artículo y párrafo.
		            $resultado['idTitles'] = intval($fila['idTitles']);
		            $resultado['name_title'] = $fila['name_title'];
		            $resultado['status_title'] = $fila['status_title'];
		            $resultado['type_title'] = $fila['type_title'];
		            $resultado['Admin_idAdmin'] = $fila['Admin_idAdmin'];

		            if ($capituloId) {
		                $resultado['capitulos'][$capituloId]['name_Chapter'] = $fila['name_Chapter'];

		                if ($seccionId) {
		                    $resultado['capitulos'][$capituloId]['secciones'][$seccionId]['name_section'] = $fila['name_section'];

		                    if ($articuloId) {
		                        $resultado['capitulos'][$capituloId]['secciones'][$seccionId]['articulos'][$articuloId]['name_article'] = $fila['name_article'];

		                        if ($parrafoId) {
		                            $resultado['capitulos'][$capituloId]['secciones'][$seccionId]['articulos'][$articuloId]['parrafos'][$parrafoId] = array(
		                                'paragraph' => $fila['paragraph'],
		                                'position' => $fila['position']
		                            );
		                        }
		                    }
		                }
			            }
			        // Agrega la información de la portada.
		            $resultado['cover'] = array(
		                'idCover' => intval($fila['idCover']),
		                'cover_name' => $fila['cover_name']
		            );
					
		        }
					$datos['results'][] = $resultado;
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
	
}