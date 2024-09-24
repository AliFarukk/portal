<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?= $page_title; ?></title>

	<!-- Google Font: Source Sans Pro -->
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
	<!-- Font Awesome -->
	<link rel="stylesheet" href="<?= ASSETS ?>adminlte/plugins/fontawesome-free/css/all.min.css">
	<!-- icheck bootstrap -->
	<link rel="stylesheet" href="<?= ASSETS ?>adminlte/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
	<!-- Theme style -->
	<link rel="stylesheet" href="<?= ASSETS ?>adminlte/dist/css/adminlte.min.css">
	<style>
		.login-box {
			display: block;
		}

		.bg-white {
			background-color: #fff;
		}

		.bg-gray {
			background-color: #ebe8ff !important;
		}

		.vh-100 {
			height: 100vh;
		}

		.btn-sst {
			background-color: #6754e9 !important;
			color: #fff !important;
		}

		.btn-sst:hover {
			background-color: #6754e90a !important;
			color: #000 !important;
		}

		@media screen and (max-width:767px) {
			.left-side {
				display: none;
			}
		}
	</style>
</head>

<body class="">

	<!-- /.login-box -->
	<div class="container-fluid vh-100">

		<div class="row vh-100">
			<div class="col-7 bg-gray left-side">
				<div class="row flex-column justify-content-center align-items-center">
					<div class="w-50 py-3">
						<img class="img-fluid" src="<?= ASSETS . 'images/login-logo.png' ?>" alt="">
					</div>
					<div>
						<h3 class="text-dark">Stay updated with your SEO progress</h3>
					</div>
					<div>
						<img class="img-fluid" src="<?= ASSETS . 'images/lines-icon.png' ?>" alt="">
					</div>

				</div>
			</div>
			<div class="col-lg-5 col-sm-12">
				<div class="row justify-content-center">
					<img class=" py-4" width="120px" height="auto" src="<?= ASSETS . 'images/sst-logo.png' ?>" alt="">
				</div>
				<div class="row pt-5 justify-content-center align-items-between">
					<div class="login-box">
						<!-- /.login-logo -->
						<div class="">
							<div class="card-body login-card-body">
								<!-- credential required errors -->
								<?php if ($auth_errors) : ?>
									<div class="alert alert-danger alert-dismissible fade show" role="alert">
										<?= $auth_errors ?>
										<button type="button" class="close" data-dismiss="alert" aria-label="Close">
											<span aria-hidden="true">&times;</span>
										</button>
									</div>
								<?php endif; ?>
								<!-- credentials wrong error -->
								<?php if ($this->session->flashdata('login_failed')) : ?>
									<div class="alert alert-danger alert-dismissible fade show" role="alert">
										<?= $this->session->flashdata('login_failed') ?>
										<button type="button" class="close" data-dismiss="alert" aria-label="Close">
											<span aria-hidden="true">&times;</span>
										</button>
									</div>
								<?php endif; ?>
								<h3 class="text-center text-dark">Sign in</h3>
								<p class="login-box-msg">Sign in to start your session</p>
								<form action="<?php echo BASE_URL ?>auth/login" method="post">
									<div class="input-group mb-3">
										<input type="email" name="email" class="form-control" placeholder="Email" required>
										<div class="input-group-append">
											<div class="input-group-text">
												<span class="fas fa-envelope"></span>
											</div>
										</div>
									</div>
									<div class="input-group mb-3">
										<input type="password" name="password" class="form-control" placeholder="Password" required>
										<div class="input-group-append">
											<div class="input-group-text">
												<span class="fas fa-lock"></span>
											</div>
										</div>
									</div>


									<button type="submit" class="btn btn-primary btn-sst btn-block">Sign In</button>

								</form>
							</div>
							<!-- /.login-card-body -->
						</div>
					</div>
				</div>
			</div>
		</div>

	</div>

	<!-- jQuery -->
	<script src="<?= ASSETS ?>adminlte/plugins/jquery/jquery.min.js"></script>
	<!-- Bootstrap 4 -->
	<script src="<?= ASSETS ?>adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
	<!-- AdminLTE App -->
	<script src="<?= ASSETS ?>adminlte/dist/js/adminlte.min.js"></script>
</body>

</html>
