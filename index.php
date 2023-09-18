<?php

require_once "controller/plantilla.controlador.php";

require_once "controller/formularios.controlador.php";
require_once "model/formularios.modelo.php";

$plantilla = new ControladorPlantilla();
$plantilla -> ctrTraerPlantilla();

?>

	<script src="assets/libs/dataTable/datatables.min.js"></script>
	<script src="assets/libs/dataTable/datatables.js"></script>
	<script src="assets/js/app/Cerrar_Sesion.js"></script>
</body>

</html>