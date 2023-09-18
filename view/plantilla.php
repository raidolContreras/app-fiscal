<?php 
header('Content-Type: text/html; charset=utf-8');
session_start();
?>
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
	<script src="assets/libs/dataTable/datatables.min.js"></script>
	<script src="assets/js/app/Cerrar_Sesion.js"></script>
</body>

</html>