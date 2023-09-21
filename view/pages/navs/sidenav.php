<!-- Sidebar Start -->
<aside class="left-sidebar">
	<!-- Sidebar scroll-->
	<div>
		<div class="brand-logo d-flex align-items-center justify-content-between">
			<a href="Inicio" class="text-nowrap logo-img">
				<img src="assets/images/logos/dark-logo.svg" width="180" alt="" />
			</a>
		</div>
		<!-- Sidebar navigation-->
		<nav class="sidebar-nav scroll-sidebar" data-simplebar="init">
			<ul id="sidebarnav">
				<?php if (isset($_GET['pagina']) && in_array($_GET['pagina'], array('Reglamentos', 'Articulos', 'Inicio', 'Capitulos', 'Secciones', 'Parrafos'))): ?>
				<li class="sidebar-item selected">
					<a class="sidebar-link active" href="Inicio" aria-expanded="false">
				<?php else: ?>
				<li class="sidebar-item">
					<a class="sidebar-link" href="Inicio" aria-expanded="false">
				<?php endif ?>
						<span>
							<i class="ti ti-layout-dashboard"></i>
						</span>
						<span class="hide-menu">Inicio</span>
					</a>
				</li>
				<li class="nav-small-cap">
					<i class="ti ti-dots nav-small-cap-icon fs-4"></i>
					<span class="hide-menu">UI COMPONENTS</span>
				</li>
				<li class="sidebar-item">
					<a class="sidebar-link" href="Registros-Admin" aria-expanded="false">
						<span>
							<i class="ti ti-layout-dashboard"></i>
						</span>
						<span class="hide-menu">Administradores</span>
					</a>
				</li>
			</ul>
		</nav>
		<!-- End Sidebar navigation -->
	</div>
	<!-- End Sidebar scroll-->
</aside>
<!--  Sidebar End -->