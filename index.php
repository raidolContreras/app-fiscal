
<!doctype html>
<html lang="es">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="shortcut icon" type="image/png" href="assets/images/logos/favicon.ico" />
	<link rel="stylesheet" href="assets/css/styles.min.css" />
	<link rel="stylesheet" href="assets/css/inStyle.css" />
	<link href="/assets/libs/datatable/datatables.min.css" rel="stylesheet">
 
	<?php if (isset($_GET["pagina"])): ?>
		<title><?php echo 'IN Fiscal - '.$_GET["pagina"]; ?></title>
	<?php else: ?>
		<title><?php echo 'IN Fiscal'; ?></title>
	<?php endif ?>
</head>

<?php

require_once "controller/plantilla.controlador.php";

require_once "controller/formularios.controlador.php";
require_once "model/formularios.modelo.php";

$plantilla = new ControladorPlantilla();
$plantilla -> ctrTraerPlantilla();