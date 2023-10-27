<?php 

include_once 'models/models.php';

class ControllerApi{

	static public function titles(){
		$resultados = ModelsApi::titles();
	    if (!empty($resultados)) {
	        $datos = array();  // Cambio 'Titulos' a 'Títulos' con acento y uso de array asociativo

	        foreach ($resultados as $fila) {
	            $tituloId = $fila['idTitles'];
	            $capituloId = $fila['idChapters'];
	            $seccionId = $fila['idSections'];
	            $articuloId = $fila['idArticles'];
	            $parrafoId = $fila['idParagraph'];

	            // Agrupa los datos por título, capítulo, sección, artículo y párrafo.
	            $datos[$tituloId]['name_title'] = $fila['name_title'];
	            $datos[$tituloId]['status_title'] = $fila['status_title'];
	            $datos[$tituloId]['type_title'] = $fila['type_title'];
	            $datos[$tituloId]['Admin_idAdmin'] = $fila['Admin_idAdmin'];

	            if ($capituloId) {
	                $datos[$tituloId]['capitulos'][$capituloId]['name_Chapter'] = $fila['name_Chapter'];

	                if ($seccionId) {
	                    $datos[$tituloId]['capitulos'][$capituloId]['secciones'][$seccionId]['name_section'] = $fila['name_section'];

	                    if ($articuloId) {
	                        $datos[$tituloId]['capitulos'][$capituloId]['secciones'][$seccionId]['articulos'][$articuloId]['name_article'] = $fila['name_article'];

	                        if ($parrafoId) {
	                            $datos[$tituloId]['capitulos'][$capituloId]['secciones'][$seccionId]['articulos'][$articuloId]['parrafos'][$parrafoId] = array(
	                                'paragraph' => $fila['paragraph'],
	                                'position' => $fila['position']
	                            );
	                        }
	                    }
	                }
	            }
	        }
            echo json_encode($datos, JSON_PRETTY_PRINT);
	    } else {
            echo json_encode(array('mensaje' => 'No se encontraron registros de títulos.'), JSON_PRETTY_PRINT);
	    }
	}
	
}