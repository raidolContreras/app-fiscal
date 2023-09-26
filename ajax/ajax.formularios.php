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

	public function Reg_Section(){
		$section = $this->section;
		$reglament = $this->reglament;
		$chapter = $this->chapter;
		$Reg_Section = ControladorFormularios::ctrRegistrarSections($section,$reglament,$chapter);
		echo $Reg_Section;
	}

	public function Reg_Article(){
		$article = $this->article;
		$section = $this->section;
		$reglament = $this->reglament;
		$chapter = $this->chapter;
		$Reg_Article = ControladorFormularios::ctrRegistrarArticles($article,$section,$reglament,$chapter);
		echo $Reg_Article;
	}

	public function Reg_Parrafos(){
		$article = $this->article;
		$parrafos = $this->parrafos;
		$Reg_Parrafos = ControladorFormularios::ctrRegistrarParrafos($article,$parrafos);
		echo $Reg_Parrafos;
	}

	public function Add_Parrafos(){
		$article = $this->article;
		$parrafos = $this->parrafos;
		$position = $this->position;
		$Add_Parrafos = ControladorFormularios::ctrAgregarParrafos($article,$parrafos,$position);
		echo $Add_Parrafos;
	}

	public function update_title(){
		$title = $this->title;
		$idTitle = $this->idTitle;
		$Add_Parrafos = ControladorFormularios::ctrUpdateTitle($title,$idTitle);
		echo $Add_Parrafos;
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
	if ($capitulo != '') {
		$Reg_Captitulo = new FormulariosAjax();
		$Reg_Captitulo -> capitulo = $capitulo;
		$Reg_Captitulo -> Reglamento = $Reglamento;
		$Reg_Captitulo -> Reg_Captitulo();
	}else{
		echo 'empty';
	}
}

if (isset($_POST['Add-Seccion'])) {
	$section = $_POST['Add-Seccion'];
	$reglament = $_POST['Reglamento'];
	$chapter = $_POST['Capitulo'];
	if ($section != '') {
		$Reg_Section = new FormulariosAjax();
		$Reg_Section -> section = $section;
		$Reg_Section -> reglament = $reglament;
		$Reg_Section -> chapter = $chapter;
		$Reg_Section -> Reg_Section();
	}else{
		echo 'empty';
	}
}

if (isset($_POST['Add-Articulo'])) {
	$article = $_POST['Add-Articulo'];
	$reglament = $_POST['Reglamento'];
	$chapter = $_POST['Capitulo'];
	$section = $_POST['Section'];
	if ($article != '') {
		$Reg_Article = new FormulariosAjax();
		$Reg_Article -> article = $article;
		$Reg_Article -> section = $section;
		$Reg_Article -> reglament = $reglament;
		$Reg_Article -> chapter = $chapter;
		$Reg_Article -> Reg_Article();
	}else{
		echo 'empty';
	}
}

if (isset($_POST['parrafos'])) {
	$parrafos = explode("\n", $_POST['parrafos']);
	$article = $_POST['Article'];

	if ($_POST['parrafos'] != '') {
		$Reg_Parrafos = new FormulariosAjax();
		$Reg_Parrafos -> article = $article;
		$Reg_Parrafos -> parrafos = $parrafos;
		$Reg_Parrafos -> Reg_Parrafos();
	}
}

if (isset($_POST['Add-Parrafo-Plus'])) {
	$parrafos = explode("\n", $_POST['Add-Parrafo-Plus']);
	$article = $_POST['Article'];
	$position = $_POST['Position'];

	if ($_POST['Add-Parrafo-Plus'] != '') {
		$Add_Parrafos = new FormulariosAjax();
		$Add_Parrafos -> article = $article;
		$Add_Parrafos -> parrafos = $parrafos;
		$Add_Parrafos -> position = $position;
		$Add_Parrafos -> Add_Parrafos();
	}
}

if (isset($_POST['update_name_title'])) {
	$title =$_POST['update_name_title'];
	$idTitle = $_POST['update_title'];

	if ($_POST['update_name_title'] != '') {
		$update_title = new FormulariosAjax();
		$update_title -> title = $title;
		$update_title -> idTitle = $idTitle;
		$update_title -> update_title();
	}else{
		echo 'empty';
	}
}

if (isset($_POST['upload_photo'])) {
	echo "ok";
}