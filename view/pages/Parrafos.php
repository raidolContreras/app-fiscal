<?php if (isset($_GET['reglament']) && isset($_GET['chapter']) && $_GET['article']): 
	
	$parrafos = ControladorFormularios::ctrVerParrafos($_GET['article']);
?>

<div class="card bg-light-info shadow-none position-relative overflow-hidden">
	<div class="card-body px-4 py-3">
		<div class="row align-items-center">
			<div class="col-9">
				<h4 class="fw-semibold mb-8">Parrafos</h4>
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
						<li class="breadcrumb-item">
							<a class="text-muted text-decoration-none" href="Secciones&reglament=<?php echo $_GET['reglament'] ?>&chapter=<?php echo $_GET['chapter'] ?>">Secciones</a>
						</li>
						<li class="breadcrumb-item">
							<a class="text-muted text-decoration-none" href="Articulos&reglament=<?php echo $_GET['reglament'] ?>&chapter=<?php echo $_GET['chapter'] ?>">Articulos</a>
						</li>
						<li class="breadcrumb-item" aria-current="page">
							Parrafos
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
					<h5 class="fw-semibold mb-0">Articulos</h5>
				</div>
			</div>
			<div class="col-md-8 col-xl-9 text-end d-flex justify-content-md-end justify-content-center mt-3 mt-md-0">
				<button class="btn btn-warning d-flex align-items-center"
						type="button" data-bs-toggle="modal" data-bs-target="#Add-Parrafo-Modal">
					<i class="ti ti-files text-white me-1 fs-5"></i> Agregar Textos
				</button>
			</div>
		</div>
	</div>
	<div class="card-body p-4">
		<div class="table-responsive">
			<table class="table border table-striped table-bordered text-nowrap dataTable" id="capitulo">
				<thead>
					<tr>
						<th width="10%">Posición</th>
						<th width="80%">Articulo</th>
						<th width="10%"></th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($parrafos as $parrafo): ?>
					<tr>
						<td>
							<?php echo $parrafo['position']; ?>
						</td>
						<td>
							<?php echo $parrafo['paragraph']; ?>
						</td>
						<td>
							Editar
							<button class="
							btn
							rounded-pill
							px-2
							mx-2
							btn-light-success
							text-success
							font-weight-medium
							waves-effect waves-light
							"
							type="button"
							data-bs-toggle="modal" data-bs-target="#Edit-Modal">
								<i class="ti ti-edit fs-5"></i>
							</button>
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
		<div class="modal fade" id="Add-Parrafo-Modal" tabindex="-1" aria-labelledby="bs-example-modal-lg" aria-hidden="true">
			<div class="modal-dialog modal-xl">
				<div class="modal-content">
					<div class="modal-header d-flex align-items-center">
						<h4 class="modal-title" id="myLargeModalLabel">
							Agregar Textos
						</h4>
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					</div>
						<form class="row" id="add-parrafos-form">
							<div class="col-md-8 mx-auto"> <!-- Utiliza la clase mx-auto para centrar horizontalmente -->
								<div class="input-group mb-3">
									<textarea class="form-control" name="Add-Parrafo-Plus" id="Add-Parrafo-Plus" placeholder="Agregar texto" rows="10" cols="50"></textarea>
									<input type="hidden" name="Article" value="<?php echo $_GET['article'] ?>">
									<input type="hidden" name="Position" value="<?php echo $parrafo['position']+1 ?>">
								</div>
							</div>
						</form>
					<div class="modal-footer">
						<button type="button" class="btn btn-light-primary text-primary font-medium waves-effect text-start" id="add-parrafos-btn">
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

<script src="assets/js/app/Parrafos.js"></script>
<?php endif ?>