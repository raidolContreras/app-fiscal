Dropzone.autoDiscover = false;

$(document).ready(function() {
	var myDropzone = new Dropzone("#documentos-dropzone", {
		url: "ajax/upload_book_cover.php",
		method: "POST", // En lugar de "type", utiliza "method"
		paramName: "file",
		maxFilesize: 10,
		acceptedFiles: ".jpg,.jpeg,.png",
		addRemoveLinks: true,
		dictRemoveFile: "Eliminar archivo",
		maxFiles: 1,
		uploadMultiple: false,
		autoProcessQueue: false // Habilita la carga automática de archivos
	});

	$("#upload-photo-btn").click(function() {
		// Procesar la cola de carga de Dropzone antes de la llamada AJAX
		myDropzone.processQueue();
	});

	myDropzone.on("success", function(file, response) {
		if (response === "error_tamano") {
			// Mensaje de error: tamaño de archivo excedido
			$("#form-result").html(`
				<div class='alert alert-danger' role="alert" id="alerta">
					<b>Error:</b> Tamaño de archivo excedido.
				</div>
			`);
			deleteAlert();
		} else if (response === "error_tipo") {
			// Mensaje de error: tipo de archivo no permitido
			$("#form-result").html(`
				<div class='alert alert-danger' role="alert" id="alerta">
					<b>Error:</b> Tipo de archivo no permitido.
				</div>
			`);
			deleteAlert();
		} else {
			// La carga fue exitosa (puedes verificar un código de estado HTTP 200 aquí)
			$("#form-result").html(`
				<div class='alert alert-success' role="alert" id="alerta">
					Portada cargada correctamente.
				</div>
			`);
			deleteAlert();
			
			setTimeout(function() {
				location.reload();
			}, 900);
		}
	});
});

document.addEventListener("DOMContentLoaded", function () {
	$('#update_name_reglament-btn').click(function() {
		var formData = $("#update_name_reglament-form").serialize();
		$.ajax({
			url: "ajax/ajax.formularios.php",
			type: "POST",
			data: formData,
			success: function(response) {
				$("#form-result").val("");
				if (response === 'ok') {
					$("#form-result").html(`
						<div class='alert alert-success' role="alert" id="alerta">
							Titulo Actualizado.
						</div>
					`);
					setTimeout(function() {
						location.reload();
					}, 900);
				} else if (response === 'empty'){
					$("#form-result").html(`
						<div class='alert alert-danger' role="alert" id="alerta">
							<b>Error</b>, el titulo no puede estar vacio, intentalo nuevamente.
						</div>
					`);
				} else {
					$("#form-result").html(`
						<div class='alert alert-danger' role="alert" id="alerta">
							<b>Error</b>, no se pudo actualizar el titulo, intentalo nuevamente.
						</div>
					`);
				}

				deleteAlert();
			
			}
		});
	});
});