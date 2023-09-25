<?php $Reglamento = ControladorFormularios::ctrVerReglamentos('idTitles', $_GET['reglament']); 
$cover = ModeloFormularios::mdlVerCover($_GET['reglament']);
?>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/min/dropzone.min.css" />

<div class="card bg-light-info shadow-none position-relative overflow-hidden">
	<div class="card-body px-4 py-3">
		<div class="row align-items-center">
			<div class="col-9">
				<h4 class="fw-semibold mb-8">Editar <?php echo $Reglamento['name_title'] ?></h4>
				<nav aria-label="breadcrumb">
					<ol class="breadcrumb">
						<li class="breadcrumb-item">
							<a class="text-muted text-decoration-none" href="Inicio">Inicio</a>
						</li>
						<li class="breadcrumb-item">
							<a class="text-muted text-decoration-none" href="Reglamentos">Reglamentos</a>
						</li>
						<li class="breadcrumb-item" aria-current="page">
							<?php echo $Reglamento['name_title'] ?>
						</li>
					</ol>
				</nav>
			</div>
		</div>
	</div>
</div>
<div class="card">
	<div class="px-4 py-3 border-bottom">
		<div class="row">
			<div class="col-md-12">
				<div class="position-relative">
					<h5 class="fw-semibold mb-0">Editar <?php echo $Reglamento['name_title'] ?></h5>
				</div>
			</div>
		</div>
	</div>
	<div class="card-body p-4">
		<div>
			<form class="row" id="update_name_reglament-form">
					<label for="update_name_title">Nombre</label>
				<div class="col-10">
					<input type="text" class="form-control" name="update_name_title" id="update_name_title" value="<?php echo $Reglamento['name_title'] ?>">
				</div>
				<div class="col-2">
					<button type="button" class="btn btn-primary" id="update_name_reglament-btn">Actualizar</button>
				</div>
			</form>
		</div>
		<?php if (!empty($cover)): ?>
			<div class="card mt-3 col-xl-4 col-xs-12">
				<img src="assets/images/covers/<?php echo $Reglamento['name_title'] ?>/<?php echo $cover['name_cover'] ?>" class="card-img-top" alt="cover <?php echo $Reglamento['name_title'] ?>">
				<div class="card-body">
					<h5 class="card-title">Portada</h5>
				</div>
			</div>
		<?php endif ?>
		<div class="row mt-3">
			<div class="col-xl-12 card">
				<form class="dropzone my-3" id="documentos-dropzone" enctype="multipart/form-data">
					<input type="hidden" id="upload_photo" name="upload_photo" value="<?php echo $Reglamento['idTitles']; ?>">
					<input type="hidden" id="foto_reglamento" name="foto_reglamento" value="<?php echo $Reglamento['name_title']; ?>">
					<div class="dz-message">
						Arrastra y suelta el archivo aquí o haz clic para seleccionar el archivo para cargar.
						<p class="subtitulo-sup">Tipos de archivo permitidos .jpg,.jpeg,.png (Tamaño máximo 10 MB)</p>
					</div>
				</form>
				<button type="button" class="btn btn-primary" id="upload-photo-btn">Actualizar</button>
			</div>
		</div>
	</div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/min/dropzone.min.js"></script>
<script src="assets/js/app/Cover.js"></script>