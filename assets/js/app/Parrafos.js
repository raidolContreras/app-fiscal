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

	$('#Edit-Modal').on('show.bs.modal', function (event) {
		var button = $(event.relatedTarget) // Button that triggered the modal
		var name = button.data('name') // Extract info from data-* attributes
		var id = button.data('id') 
		// If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
		// Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
		var modal = $(this)
		modal.find('.modal-title').text('' + name)
		modal.find('#Article').val(id)
		modal.find('#parrafos').val('')
	});

	if ('#parrafos' !== '') {
		$('#add-parrafos-btn').click(function() {
			var formdata = $("#add-parrafos-form").serialize();
			$.ajax({
				url: "ajax/ajax.formularios.php",
				type: "POST",
				data: formdata,
				success: function(response) {
					$("#form-result").val("");
					if (response === 'ok') {
						$("#form-result").html(`
							<div class='alert alert-success' role="alert" id="alerta">
								Articulo editado exitosamente.
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
								<b>Error</b>, Campo vacio, Llena el campo del texto.
							</div>
						`);
						deleteAlert();
					}
					else {
						$("#form-result").html(`
							<div class='alert alert-danger' role="alert" id="alerta">
								<b>Error</b>, no se pudo crear el texto, intentalo nuevamente.
							</div>
						`);
						deleteAlert();
					}
				}
			});
		});
	}
});