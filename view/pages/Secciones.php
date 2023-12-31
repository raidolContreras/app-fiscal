<?php if (isset($_GET['reglament']) && isset($_GET['chapter'])): ?>
<?php $sections = ControladorFormularios::ctrVerSecciones($_GET['reglament'],$_GET['chapter']); ?>
<div class="card bg-light-info shadow-none position-relative overflow-hidden">
	<div class="card-body px-4 py-3">
		<div class="row align-items-center">
			<div class="col-9">
				<h4 class="fw-semibold mb-8">Secciones</h4>
				<nav aria-label="breadcrumb">
					<ol class="breadcrumb">
						<li class="breadcrumb-item">
							<a class="text-muted text-decoration-none" href="Inicio">Inicio</a>
						</li>
						<li class="breadcrumb-item">
							<a class="text-muted text-decoration-none" href="Reglamentos">Reglamentos</a>
						</li>
						<li class="breadcrumb-item">
							<a class="text-muted text-decoration-none" href="Capitulos&reglament=<?php echo $_GET['reglament'] ?>">Capitulos</a>
						</li>
						<li class="breadcrumb-item" aria-current="page">
							Secciones
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
					<h5 class="fw-semibold mb-0">Secciones</h5>
				</div>
			</div>
			<div class="col-md-8 col-xl-9 text-end d-flex justify-content-md-end justify-content-center mt-3 mt-md-0">
				<button class="btn btn-warning d-flex align-items-center"
						type="button" data-bs-toggle="modal" data-bs-target="#Add-Seccion-Modal">
					<i class="ti ti-files text-white me-1 fs-5"></i> Agregar Sección
				</button>
			</div>
		</div>
	</div>
	<div class="card-body p-4">
		<div class="table-responsive">
			<table class="table border table-striped table-bordered text-nowrap dataTable" id="capitulo">
				<thead>
					<tr>
						<th>Nombre</th>
						<th>Articulos</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($sections as $section): 
						$cantidades = ControladorFormularios::ctrVerSeccion($section['idSections']);
						?>
					<tr>
						<td>
							<?php echo $section['name_section']; ?>
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
							href = "Articulos&reglament=<?php echo $_GET['reglament'] ?>&chapter=<?php echo $_GET['chapter'] ?>&section=<?php echo $section['idSections'] ?>">
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
		<div class="modal fade" id="Add-Seccion-Modal" tabindex="-1" aria-labelledby="bs-example-modal-lg" aria-hidden="true">
			<div class="modal-dialog modal-xl">
				<div class="modal-content">
					<div class="modal-header d-flex align-items-center">
						<h4 class="modal-title" id="myLargeModalLabel">
							Agregar Sección
						</h4>
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					</div>
						<form class="row" id="add-capitulo-form">
							<div class="col-md-8 mx-auto"> <!-- Utiliza la clase mx-auto para centrar horizontalmente -->
								<div class="input-group mb-3">
									<input type="text" class="form-control" name="Add-Seccion" id="Add-Seccion" placeholder="Nombre de la Sección">
									<input type="hidden" name="Reglamento" value="<?php echo $_GET['reglament'] ?>">
									<input type="hidden" name="Capitulo" value="<?php echo $_GET['chapter'] ?>">
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

<script src="assets/js/app/Secciones.js"></script>
<?php endif ?>