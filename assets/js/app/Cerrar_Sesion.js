document.addEventListener("DOMContentLoaded", function () {
	$('#close-sesion').click(function() {
		$.ajax({
			url: "ajax/ajax.formularios.php",
			type: "POST",
			data: {cerrar_sesion: true},
			success: function(response) {
				$("#form-result").val("");
				if (response === 'ok') {
					$("#form-result").html(`
						<div class='alert alert-success' role="alert" id="alerta">
							Hasta luego.
						</div>
					`);
					deleteAlert();
					setTimeout(function() {
						location.reload();
					}, 900);
				}
				else {
					$("#form-result").html(`
						<div class='alert alert-danger' role="alert" id="alerta">
							<b>Error</b>, no se pudo cerrar sesión, intentalo nuevamente.
						</div>
					`);
					deleteAlert();
				}
			}
		});
	});
});