<?php 
require_once "../controller/formularios.controlador.php";
require_once "../model/formularios.modelo.php";

require_once "../controller/controlador.admin.php";
require_once "../model/modelo.admin.php";

session_start();
class FormulariosAjax{

	public function Reg_Reglamento(){
		$Reglamento = $this->Reglamento;
		$Reg_Reglamento = ControladorFormularios::ctrRegistrarReglamentos($Reglamento);
		echo $Reg_Reglamento;
	}

	public function IniciarSesion(){
		$username_email = $this->username_email;
		$Password = $this->Password;
		$IniciarSesion = ControladorAdmin::ctrLogin($username_email, $Password);
		echo $IniciarSesion;
	}

	public function Reg_Captitulo(){
		$capitulo = $this->capitulo;
		$Reglamento = $this->Reglamento;
		$Reg_Captitulo = ControladorFormularios::ctrRegistrarCapitulos($capitulo,$Reglamento);
		echo $Reg_Captitulo;
	}

}

/*---------------------------------------------------------------------*/

if (isset($_POST['Add-Reglamento'])) {
	$Reglamento = $_POST['Add-Reglamento'];
	if ($Reglamento != '') {
		$Reg_Reglamento = new FormulariosAjax();
		$Reg_Reglamento -> Reglamento = $Reglamento;
		$Reg_Reglamento -> Reg_Reglamento();
	}else{
		echo 'empty';
	}
}

if (isset($_POST['username-email'])) {
	$username_email = $_POST['username-email'];
	$Password = $_POST['Password'];
	$IniciarSesion = new FormulariosAjax();
	$IniciarSesion -> username_email = $username_email;
	$IniciarSesion -> Password = $Password;
	$IniciarSesion -> IniciarSesion();
}

if (isset($_POST['cerrar_sesion'])) {
	session_destroy();
	echo 'ok';
}

if (isset($_POST['Add-Capitulo'])) {
	$capitulo = $_POST['Add-Capitulo'];
	$Reglamento = $_POST['Reglamento'];
	$Reg_Captitulo = new FormulariosAjax();
	$Reg_Captitulo -> capitulo = $capitulo;
	$Reg_Captitulo -> Reglamento = $Reglamento;
	$Reg_Captitulo -> Reg_Captitulo();
}