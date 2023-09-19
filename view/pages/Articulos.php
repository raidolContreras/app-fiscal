<?php if (isset($_GET['reglament']) && isset($_GET['chapter'])): ?>
<?php
	if (isset($_GET['section'])) {
		$articles = ControladorFormularios::ctrVerArticulos($_GET['reglament'],$_GET['chapter'],$_GET['section']); 
		$section = $_GET['section'];
	}else{
		$articles = ControladorFormularios::ctrVerArticulos($_GET['reglament'],$_GET['chapter'],0);
		$section = 0;
	}

?>
<div class="card bg-light-info shadow-none position-relative overflow-hidden">
	<div class="card-body px-4 py-3">
		<div class="row align-items-center">
			<div class="col-9">
				<h4 class="fw-semibold mb-8">Articulos</h4>
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
						<li class="breadcrumb-item" aria-current="page">
							Articulos
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
					<h5 class="fw-semibold mb-0">Articulos</h5>
				</div>
			</div>
			<div class="col-md-8 col-xl-9 text-end d-flex justify-content-md-end justify-content-center mt-3 mt-md-0">
				<button class="btn btn-info d-flex align-items-center"
						type="button" data-bs-toggle="modal" data-bs-target="#Add-Seccion-Modal">
					<i class="ti ti-files text-white me-1 fs-5"></i> Agregar Articulos
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
						<th>Parrafos</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($articles as $article): ?>
					<tr>
						<td>
							<?php echo $article['name_article']; ?>
						</td>
						<td>
							Editar
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
							href = "Parrafos&article=<?php echo $article['idArticles'] ?>">
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
							Agregar Articulos
						</h4>
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					</div>
						<form class="row" id="add-capitulo-form">
							<div class="col-md-8 mx-auto"> <!-- Utiliza la clase mx-auto para centrar horizontalmente -->
								<div class="input-group mb-3">
									<input type="text" class="form-control" name="Add-Articulo" id="Add-Articulo" placeholder="Nombre de la Articulos">
									<input type="hidden" name="Reglamento" value="<?php echo $_GET['reglament'] ?>">
									<input type="hidden" name="Capitulo" value="<?php echo $_GET['chapter'] ?>">
									<input type="hidden" name="Section" value="<?php echo $section ?>">
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