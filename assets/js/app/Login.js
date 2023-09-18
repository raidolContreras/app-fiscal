document.addEventListener("DOMContentLoaded", function () {
	$('#authentication-login-btn').click(function() {
		var formData = $("#authentication-login-form").serialize();
		$.ajax({
			url: "ajax/ajax.formularios.php",
			type: "POST",
			data: formData,
			success: function(response) {
				$("#form-result").val("");
				if (response === 'ok') {
					$("#form-result").html(`
						<div class='alert alert-success' role="alert" id="alerta">
							Bienvenido.
						</div>
					`);
					deleteAlert();
					setTimeout(function() {
						location.reload();
					}, 900);
				}
				else if (response === 'Error: status') {
					$("#form-result").html(`
						<div class='alert alert-warning' role="alert" id="alerta">
							<b>Error</b>, cuenta inhabilidata.
						</div>
					`);
					deleteAlert();
				}
				else {
					$("#form-result").html(`
						<div class='alert alert-danger' role="alert" id="alerta">
							<b>Error</b>, no se pudo iniciar sesión, revisa de nuevo tus datos, intentalo nuevamente.
						</div>
					`);
					deleteAlert();
				}
			}
		});
	});
});