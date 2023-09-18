<?php

class ControladorFormularios{

	/*---------- Esta función envia los datos para crear el formato del numero teléfonico ---------- */
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
	/*---------- Fin de ControladorFormularios ---------- */
}