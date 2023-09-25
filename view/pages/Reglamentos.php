<?php $Reglamentos = ControladorFormularios::ctrVerReglamentos(null, null); ?>
<div class="card bg-light-info shadow-none position-relative overflow-hidden">
	<div class="card-body px-4 py-3">
		<div class="row align-items-center">
			<div class="col-9">
				<h4 class="fw-semibold mb-8">Reglamentos</h4>
				<nav aria-label="breadcrumb">
					<ol class="breadcrumb">
						<li class="breadcrumb-item">
							<a class="text-muted text-decoration-none" href="Inicio">Inicio</a>
						</li>
						<li class="breadcrumb-item" aria-current="page">
							Reglamentos
						</li>
					</ol>
				</nav>
			</div>
			<div class="col-3">
				<div class="text-center mb-n5">
				</div>
			</div>
		</div>
	</div>
</div>
<div class="card">
	<div class="px-4 py-3 border-bottom">
		<div class="row">
			<div class="col-md-4 col-xl-3">
				<div class="position-relative">
					<h5 class="fw-semibold mb-0">Reglamentos</h5>
				</div>
			</div>
			<div class="col-md-8 col-xl-9 text-end d-flex justify-content-md-end justify-content-center mt-3 mt-md-0">
				<button class="btn btn-warning d-flex align-items-center"
						type="button" data-bs-toggle="modal" data-bs-target="#Add-Reglamento-Modal">
					<i class="ti ti-files text-white me-1 fs-5"></i> Agregar Reglamento
				</button>
			</div>
		</div>
	</div>
	<div class="card-body p-4">
		<div class="table-responsive">
			<table class="table border table-striped table-bordered text-nowrap dataTable" id="reglamento">
				<thead>
					<tr>
						<th>Titulo</th>
						<th>N° de Capitulos</th>
						<th>N° de Secciones</th>
						<th>N° de Articulos</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($Reglamentos as $Reglamento):
						$cantidades = ControladorFormularios::ctrVerReglamento($Reglamento['idTitles'])
					?>
					<tr>
						<td><?php echo $Reglamento['name_title'] ?>
							<a class="
							btn
							rounded-pill
							px-2
							mx-2
							btn-light-success
							text-success
							font-weight-medium
							waves-effect waves-light
							"
							href = "Editar&reglament=<?php echo $Reglamento['idTitles'] ?>">
								<i class="ti ti-send fs-5"></i>
							</a>
						</td>
						<td><?php echo $cantidades['NumeroDeCapitulos'] ?>
							<a class="
							btn
							rounded-pill
							px-2
							mx-2
							btn-light-success
							text-success
							font-weight-medium
							waves-effect waves-light
							"
							href = "Capitulos&reglament=<?php echo $Reglamento['idTitles'] ?>">
								<i class="ti ti-circle-plus fs-5"></i>
							</a>
						</td>
						<td><?php echo $cantidades['NumeroDeSecciones'] ?>
						</td>
						<td><?php echo $cantidades['NumeroDeArticulos'] ?>
						</td>
					</tr>
					<?php endforeach ?>
				</tbody>
			</table>
		</div>
	</div>
</div>

<div class="d-md-flex button-group">
	<div>
		<div class="modal fade" id="Add-Reglamento-Modal" tabindex="-1" aria-labelledby="bs-example-modal-lg" aria-hidden="true">
			<div class="modal-dialog modal-xl">
				<div class="modal-content">
					<div class="modal-header d-flex align-items-center">
						<h4 class="modal-title" id="myLargeModalLabel">
							Agregar Reglamento
						</h4>
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					</div>
					<div class="modal-body">
						<p>
							Incluye el nombre completo del reglamento que deseas agregar.
						</p>
					</div>
						<form class="row" id="add-reglamento-form">
							<div class="col-md-8 mx-auto"> <!-- Utiliza la clase mx-auto para centrar horizontalmente -->
								<div class="input-group mb-3">
									<input type="text" class="form-control" name="Add-Reglamento" id="Add-Reglamento" placeholder="Nombre del Reglamento">
								</div>
							</div>
						</form>
					<div class="modal-footer">
						<button type="button" class="btn btn-light-primary text-primary font-medium waves-effect text-start" id="add-reglamento-btn">
							Agregar
						</button>
						<button type="button" class="btn btn-light-danger text-danger font-medium waves-effect text-start" data-bs-dismiss="modal">
							Cancelar
						</button>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<script src="assets/js/app/Reglamentos.js"></script>