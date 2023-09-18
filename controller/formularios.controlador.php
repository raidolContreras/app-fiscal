<?php

class ControladorFormularios{

	static public function ctrRegistrarReglamentos($Reglamento){
		$Reg_Reglamento = ModeloFormularios::mdlRegistrarReglamentos($Reglamento);
		return $Reg_Reglamento;
	}

	static public function ctrVerReuniones(){
		$Reg_Reglamento = ModeloFormularios::mdlVerReuniones();
		return $Reg_Reglamento;
	}

	static public function ctrVerReunion($Reglamento){
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
	/*---------- Fin de ControladorFormularios ---------- */
}