<?php if (isset($_GET['reglament'])): ?>
<?php $capitulos = ControladorFormularios::ctrVerCapitulos($_GET['reglament']); ?>
<div class="card bg-light-info shadow-none position-relative overflow-hidden">
	<div class="card-body px-4 py-3">
		<div class="row align-items-center">
			<div class="col-9">
				<h4 class="fw-semibold mb-8">Capitulos</h4>
				<nav aria-label="breadcrumb">
					<ol class="breadcrumb">
						<li class="breadcrumb-item">
							<a class="text-muted text-decoration-none" href="Inicio">Inicio</a>
						</li>
						<li class="breadcrumb-item">
							<a class="text-muted text-decoration-none" href="Reglamentos">Reglamentos</a>
						</li>
						<li class="breadcrumb-item" aria-current="page">
							Capitulos
						</li>
					</ol>
				</nav>
			</div>
			<div class="col-3">
				<div class="text-center mb-n5">
					<img src="assets/images/logos/ChatBc.png" alt="" class="img-fluid mb-n4">
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
					<h5 class="fw-semibold mb-0">Capitulos</h5>
				</div>
			</div>
			<div class="col-md-8 col-xl-9 text-end d-flex justify-content-md-end justify-content-center mt-3 mt-md-0">
				<button class="btn btn-info d-flex align-items-center"
						type="button" data-bs-toggle="modal" data-bs-target="#Add-Capitulo-Modal">
					<i class="ti ti-files text-white me-1 fs-5"></i> Agregar Capitulo
				</button>
			</div>
		</div>
	</div>
	<div class="card-body p-4">
		<div class="table-responsive">
			<table class="table" id="capitulo">
				<thead>
					<tr>
						<th>Nombre</th>
						<th>Secciones</th>
						<th>Articulos</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($capitulos as $capitulo): 
						$cantidades = ControladorFormularios::ctrVerCapitulo($capitulo['idChapters'])
						?>
					<tr>
						<td>
							<?php echo $capitulo['name_Chapter']; ?>
						</td>
						<td>
							<?php echo $cantidades['NumeroDeSecciones']; ?>
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
							href = "">
								<i class="ti ti-circle-plus fs-5"></i>
							</a>
						</td>
						<td>
							<?php echo $cantidades['NumeroDeArticulos']; ?>
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
							href = "">
								<i class="ti ti-circle-plus fs-5"></i>
							</a>
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
		<div class="modal fade" id="Add-Capitulo-Modal" tabindex="-1" aria-labelledby="bs-example-modal-lg" aria-hidden="true">
			<div class="modal-dialog modal-xl">
				<div class="modal-content">
					<div class="modal-header d-flex align-items-center">
						<h4 class="modal-title" id="myLargeModalLabel">
							Agregar Capitulo
						</h4>
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					</div>
						<form class="row" id="add-capitulo-form">
							<div class="col-md-8 mx-auto"> <!-- Utiliza la clase mx-auto para centrar horizontalmente -->
								<div class="input-group mb-3">
									<input type="text" class="form-control" name="Add-Capitulo" id="Add-Capitulo" placeholder="Nombre del Capitulo">
									<input type="hidden" name="Reglamento" value="<?php echo $_GET['reglament'] ?>">
								</div>
							</div>
						</form>
					<div class="modal-footer">
						<button type="button" class="btn btn-light-primary text-primary font-medium waves-effect text-start" id="add-capitulo-btn">
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

<script src="assets/js/app/Capitulos.js"></script>
<?php endif ?>