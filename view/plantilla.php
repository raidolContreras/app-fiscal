<?php 
header('Content-Type: text/html; charset=utf-8');
session_start();
?>
<!doctype html>
<html lang="es">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="shortcut icon" type="image/png" href="assets/images/logos/favicon.ico" />
	<link rel="stylesheet" href="assets/css/styles.min.css" />
	<link rel="stylesheet" href="assets/css/inStyle.css" />
	<link href="assets/libs/datatable/datatables.min.css" rel="stylesheet">
	<script src="https://code.jquery.com/jquery-3.7.0.js"></script>
 	<script type="text/javascript" src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
 	<script type="text/javascript" src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
 
 
	<?php if (isset($_GET["pagina"])): ?>
		<title><?php echo 'IN Fiscal - '.$_GET["pagina"]; ?></title>
	<?php else: ?>
		<title><?php echo 'IN Fiscal'; ?></title>
	<?php endif ?>
</head>

<body>
	<div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
	data-sidebar-position="fixed" data-header-position="fixed">
	<?php
	if (!isset($_SESSION['validarIngreso'])) {
		include "pages/Administradores/Registros-Admin.php";
		echo '<div id="form-result" class="alerta-flotante"></div>';
	}else{

		if (isset($_GET["pagina"])){
			if ($_GET["pagina"] == "Inicio" ||
				$_GET["pagina"] == "Reglamentos" ||
				$_GET["pagina"] == "Capitulos") {

				include "pages/navs/sidenav.php";
				echo '<!--  Main wrapper -->
					<div class="body-wrapper">';
				include "pages/navs/nav.php";
				echo '<div class="container-fluid">';
				include "pages/".$_GET["pagina"].".php";
				echo '<div id="form-result" class="alerta-flotante"></div>';

			}else{
				include "pages/error404.php";
			}
		}else{
			include "pages/navs/sidenav.php";
			echo '<!--  Main wrapper -->
					<div class="body-wrapper">';
			include "pages/navs/nav.php";
			include 'view/pages/Inicio.php';
		}

	}
	?>
			</div>
		</div>
	</div>

	<script>
		function deleteAlert() {
			setTimeout(function() {
				var alert = $('#alerta');
				alert.fadeOut('slow', function() {
					alert.remove();
				});
			}, 1500);
		}
	</script>	
	<script src="assets/libs/jquery/dist/jquery.min.js"></script>
	<script src="assets/libs/simplebar/dist/simplebar.js"></script>
	<script src="assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>

	<script src="assets/js/sidebarmenu.js"></script>
	<script src="assets/js/app.min.js"></script>
	<script src="assets/js/custom.js"></script>
	<script src="assets/js/prism.js"></script>
	<script src="assets/js/app/Cerrar_Sesion.js"></script>
</body>

</html>