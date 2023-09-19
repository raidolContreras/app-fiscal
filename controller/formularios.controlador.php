<?php

class ControladorFormularios{

	static public function ctrRegistrarReglamentos($Reglamento){
		$Reg_Reglamento = ModeloFormularios::mdlRegistrarReglamentos($Reglamento);
		return $Reg_Reglamento;
	}

	static public function ctrVerReglamentos(){
		$Reg_Reglamento = ModeloFormularios::mdlVerReuniones();
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
	/*---------- Fin de ControladorFormularios ---------- */
}