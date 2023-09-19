document.addEventListener("DOMContentLoaded", function () {
	if ($("#capitulo").length) {
		$(document).ready(function () {
			var table = $('#capitulo').DataTable({
				lengthChange: false,
				scrollCollapse: true,
				paging: true,
				scrollY: 350,
				buttons: [
					{
						extend: 'excelHtml5',
						text: 'Exportar a Excel',
						className: 'btn btn-success buttons-excel buttons-html5',
						customize: function (xlsx) {
							var sheet = xlsx.xl.worksheets['sheet1.xml'];
							$('row:first c', sheet).attr('s', '42');
						}
					},
					{
						extend: 'pdfHtml5',
						text: 'Exportar a PDF',
						className: 'btn btn-danger buttons-pdf buttons-html5',
					}
				],
				fixedHeader: true,
				stateSave: true,
				language: {
					lengthMenu: 'Mostrar _MENU_ resultados por página',
					zeroRecords: 'Sin resultados - lo siento',
					info: 'Página _PAGE_ de _PAGES_',
					infoEmpty: 'No se encontraron registros',
					infoFiltered: '(Filtrado de _MAX_ registros totales)',
					search: 'Buscar',
					paginate: {
						first: 'Primero',
						previous: 'Anterior',
						next: 'Siguiente',
						last: 'Último'
					}
				}
			});

			table.buttons().container().appendTo($('#capitulo_wrapper .col-md-6:eq(0)'));
		});
	}

	if ('#Add-Capitulo' != '') {
		$('#add-capitulo-btn').click(function() {
			var delData = $("#add-capitulo-form").serialize();
			$.ajax({
				url: "ajax/ajax.formularios.php",
				type: "POST",
				data: delData,
				success: function(response) {
					$("#form-result").val("");
					if (response === 'ok') {
						$("#form-result").html(`
							<div class='alert alert-success' role="alert" id="alerta">
								sección creada exitosamente.
							</div>
						`);
						deleteAlert();
						setTimeout(function() {
							location.reload();
						}, 900);
					}
					else if (response === 'empty') {
						$("#form-result").html(`
							<div class='alert alert-danger' role="alert" id="alerta">
								<b>Error</b>, Campo vacio, Llena el campo de sección.
							</div>
						`);
						deleteAlert();
					}
					else {
						$("#form-result").html(`
							<div class='alert alert-danger' role="alert" id="alerta">
								<b>Error</b>, no se pudo crear el sección, intentalo nuevamente.
							</div>
						`);
						deleteAlert();
					}
				}
			});
		});
	}
});