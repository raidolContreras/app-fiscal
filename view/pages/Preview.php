<?php $Reglamento = ControladorFormularios::ctrVerReglamentos('idTitles', $_GET['reglament']); 
$cover = ModeloFormularios::mdlVerCover($_GET['reglament']);
$Capitulos = ControladorFormularios::ctrVerCapitulos($_GET['reglament']);
?>

<div class="card bg-light-info shadow-none position-relative overflow-hidden">
	<div class="card-body px-4 py-3">
		<div class="row align-items-center">
			<div class="col-9">
				<h4 class="fw-semibold mb-8"><?php echo $Reglamento['name_title'] ?></h4>
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
					<h5 class="fw-semibold mb-0"><?php echo $Reglamento['name_title'] ?></h5>
				</div>
			</div>
		</div>
	</div>
	<div class="card-body p-4 row" style="flex-direction: column; align-items: center;">
		<div class="card mt-3 p-3 col-xl-6 col-xs-12 shadow-card">
			<div class="book">
		<?php if (!empty($cover)): ?>
			<img src="assets/images/covers/<?php echo $Reglamento['idTitles'] ?>/<?php echo $cover['name_cover'] ?>" class="card-img-top" alt="cover <?php echo $Reglamento['name_title'] ?>">
		<?php endif ?>
			<div class="title-book m-5">
				<?php echo $Reglamento['name_title'] ?>
			</div>
		<?php foreach ($Capitulos as $capitulo):

			$sections = ControladorFormularios::ctrVerSecciones($_GET['reglament'],$capitulo['idChapters']);
			$articles = ControladorFormularios::ctrVerArticulos($_GET['reglament'],$capitulo['idChapters'],0);
		
		?>
			<div class="chapter-book">
				<?php echo $capitulo['name_Chapter'] ?>
				<hr class="style-two">
			</div>

			<?php foreach ($sections as $section): 

				$articles_sections = ControladorFormularios::ctrVerArticulos($_GET['reglament'],$capitulo['idChapters'],$section['idSections']);

			?>

			<div>

				<p class="section-book"><?php echo $section['name_section'] ?></p>

				<?php foreach ($articles_sections as $article_section): 
					 $parrafos = ControladorFormularios::ctrVerParrafos($article_section['idArticles']);
				?>

				<div>

					<p class="article-book"><?php echo $article_section['name_article'] ?></p>

					<hr class="style-two">

					<?php foreach ($parrafos as $parrafo): ?>
						<div class="mb-3 px-5">
							<p class="paragraph-book"><?php echo $parrafo['paragraph']; ?></p>
						</div>
					<?php endforeach ?>

				</div>

				<?php endforeach ?>

				<hr class="style-two">

			</div>

			<?php endforeach ?>

				<?php foreach ($articles as $article): 

					$parrafos = ControladorFormularios::ctrVerParrafos($article['idArticles']);

				?>

			<div>

				<p class="article-book"><?php echo $article['name_article'] ?></p>

				<hr class="style-two">

			</div>

					<?php foreach ($parrafos as $parrafo): ?>
						<div class="mb-3 px-5">
							<p class="paragraph-book"><?php echo $parrafo['paragraph']; ?></p>
						</div>
					<?php endforeach ?>

				<?php endforeach ?>

		<?php endforeach ?>
		</div>
	</div>
	</div>
</div>
