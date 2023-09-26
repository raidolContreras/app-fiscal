<?php

class ControladorFormularios{

	static public function ctrRegistrarReglamentos($Reglamento){
		$Reg_Reglamento = ModeloFormularios::mdlRegistrarReglamentos($Reglamento);
		return $Reg_Reglamento;
	}

	static public function ctrVerReglamentos($item, $valor){
		$Reg_Reglamento = ModeloFormularios::mdlVerReglamentos($item, $valor);
		return $Reg_Reglamento;
	}

	static public function ctrVerReglamento($Reglamento){
		$Reg_Reglamento = ModeloFormularios::mdlVerReunion($Reglamento);
		return $Reg_Reglamento;
	}

	static public function ctrVerCapitulos($reglament){
		$Capitulos = ModeloFormularios::mdlVerCapitulos($reglament);
		return $Capitulos;
	}

	static public function ctrVerCapitulo($Capitulo){
		$Capitulos = ModeloFormularios::mdlVerCapitulo($Capitulo);
		return $Capitulos;
	}

	static public function ctrRegistrarCapitulos($capitulo,$Reglamento){
		$Reg_Captitulo = ModeloFormularios::mdlRegistrarCapitulos($capitulo,$Reglamento);
		return $Reg_Captitulo;
	}

	static public function ctrVerSecciones($reglament,$chapter){
		$Seccion = ModeloFormularios::mdlVerSecciones($reglament,$chapter);
		return $Seccion;
	}

	static public function ctrVerSeccion($idSections){
		$Capitulos = ModeloFormularios::mdlVerSeccion($idSections);
		return $Capitulos;
	}

	static public function ctrRegistrarSections($section,$reglament,$chapter){
		$Secciones = ModeloFormularios::mdlRegistrarSections($section,$reglament,$chapter);
		return $Secciones;
	}

	static public function ctrVerArticulos($reglament,$chapter,$section){
		$Articulos = ModeloFormularios::mdlVerArticulos($reglament,$chapter,$section);
		return $Articulos;
	}

	static public function ctrRegistrarArticles($article,$section,$reglament,$chapter){
		$Articles = ModeloFormularios::mdlRegistrarArticles($article,$section,$reglament,$chapter);
		return $Articles;
	}

	static public function ctrRegistrarParrafos($article,$parrafos){
		$position = 1;
		$registro = 'ok';
		foreach ($parrafos as $parrafo) {
		    // Eliminar espacios en blanco adicionales al inicio y al final
		    $parrafo = trim($parrafo);

		    if (!empty($parrafo)) { // Evitar insertar párrafos vacíos

				if ($registro == 'ok') {
					$Reg_Parrafos = ModeloFormularios::mdlRegistrarParrafos($article, $parrafo, $position);
					$registro = $Reg_Parrafos;
				}

		        $position++;
		    }
		}
		return $registro;
	}

	static public function ctrVerParrafos($article){
		$Parrafos = ModeloFormularios::mdlVerParrafos($article);
		return $Parrafos;
	}

	static public function ctrAgregarParrafos($article,$parrafos,$position){
		$registro = 'ok';
		foreach ($parrafos as $parrafo) {
		    // Eliminar espacios en blanco adicionales al inicio y al final
		    $parrafo = trim($parrafo);

		    if (!empty($parrafo)) { // Evitar insertar párrafos vacíos

				if ($registro == 'ok') {
					$Reg_Parrafos = ModeloFormularios::mdlRegistrarParrafos($article, $parrafo, $position);
					$registro = $Reg_Parrafos;
				}

		        $position++;
		    }
		}
		return $registro;
	}

	static public function ctrRegistrarCover($data){
		if (empty(ModeloFormularios::mdlVerCover($data['Title_idTitles']))) {
			$cover = ModeloFormularios::mdlRegistrarCover($data);
		}else{
			$cover = ModeloFormularios::mdlUpdateCover($data);
		}
		return $cover;
	}

	static public function ctrUpdateTitle($title,$idTitle){
		$Articles = ModeloFormularios::mdlUpdateTitle($title,$idTitle);
		return $Articles;
	}
	/*---------- Fin de ControladorFormularios ---------- */
}