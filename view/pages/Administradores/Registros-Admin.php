
<!-- Preloader -->
<div class="preloader" style="display: none;">
	<img src="../../dist/images/logos/favicon.ico" alt="loader" class="lds-ripple img-fluid">
</div>
<!-- Preloader -->
<div class="preloader" style="display: none;">
	<img src="../../dist/images/logos/favicon.ico" alt="loader" class="lds-ripple img-fluid">
</div>
<!--  Body Wrapper -->
<div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-sidebartype="full" data-sidebar-position="fixed" data-header-position="fixed">
	<div class="position-relative overflow-hidden radial-gradient min-vh-100">
		<div class="position-relative z-index-5">
			<div class="row">
				<div class="col-xl-7 col-xxl-8">
					<a href="./index.html" class="text-nowrap logo-img d-block px-4 py-9 w-100">
						<img src="." width="180" alt="">
					</a>
					<div class="d-none d-xl-flex align-items-center justify-content-center" style="height: calc(100vh - 80px);">
						<img src="assets/images/Login/login-security.svg" alt="" class="img-fluid" width="500">
					</div>
				</div>
				<div class="col-xl-5 col-xxl-4">
					<div class="authentication-login min-vh-100 bg-body row justify-content-center align-items-center p-4">
						<div class="col-sm-8 col-md-6 col-xl-9">
							<h2 class="mb-3 fs-7 fw-bolder">Bienvenido a InAdmin</h2>
							<p class=" mb-9">Tu tablero administrativo</p>
							<form id="authentication-login-form">
								<div class="mb-3">
									<label for="username-email" class="form-label">Nombre de usuario o email</label>
									<input type="text" class="form-control" id="username-email" name="username-email" aria-describedby="emailHelp">
								</div>
								<div class="mb-4">
									<label for="Password" class="form-label">Contraseña</label>
									<input type="password" class="form-control" id="Password" name="Password">
								</div>
								<div class="d-flex align-items-center justify-content-between mb-4">
									<div class="form-check">
										<input class="form-check-input primary" type="checkbox" value="" id="flexCheckChecked" checked="">
										<label class="form-check-label text-dark" for="flexCheckChecked">
											Recordarme
										</label>
									</div>
									<a class="text-primary fw-medium" href="./authentication-forgot-password.html">¿Olvido su contraseña?</a>
								</div>
								<button type="button" id="authentication-login-btn" class="btn btn-primary w-100 py-8 mb-4 rounded-2">Ingresar</button>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
		
	</div>
</div>

<script src="assets/js/app/Login.js"></script>