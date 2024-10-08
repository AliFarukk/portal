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
	<!-- Ionicons -->
	<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
	<!-- Tempusdominus Bootstrap 4 -->
	<link rel="stylesheet" href="<?= ASSETS ?>adminlte/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
	<!-- iCheck -->
	<link rel="stylesheet" href="<?= ASSETS ?>adminlte/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
	<!-- JQVMap -->
	<link rel="stylesheet" href="<?= ASSETS ?>adminlte/plugins/jqvmap/jqvmap.min.css">
	<!-- Theme style -->
	<link rel="stylesheet" href="<?= ASSETS ?>adminlte/dist/css/adminlte.min.css">
	<!-- overlayScrollbars -->
	<link rel="stylesheet" href="<?= ASSETS ?>adminlte/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
	<!-- Daterange picker -->
	<link rel="stylesheet" href="<?= ASSETS ?>adminlte/plugins/daterangepicker/daterangepicker.css">
	<!-- summernote -->
	<link rel="stylesheet" href="<?= ASSETS ?>adminlte/plugins/summernote/summernote-bs4.min.css">
	<link rel="stylesheet" href="<?= ASSETS ?>adminlte/plugins/toastr/toastr.css">
	<!-- Datatables -->
	<link rel="stylesheet" href="<?= ASSETS ?>adminlte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
	<link rel="stylesheet" href="<?= ASSETS ?>adminlte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
	<!-- select search -->
	<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

	<!-- internal css -->
	<style>

		
		.table-overflow {
			overflow: auto;
		}

		@media screen and (max-width:575px) {
			#items-table tr {
				display: grid;
			}
		}

		.sst-nav {
			position: fixed !important;
			top:0px;
			z-index: 999999;
			width: 100% !important;
			/* height: 50px !important; */
			background-color: #fff !important;
		}
		/* main wrapper margin top from fixed sst-nav as height of sst-nav*/
		.wrapper{
			margin-top: 56px !important;
		}
		.sst-header-logo{
			width: 140px;
			height: auto;
		}
		/* aside setting */
		aside {
			/* top 56px because sst-nav height is 56px */
			top:56px !important;
			background-color: #6754e9 !important;
		}

		aside .os-content {
			padding: 0 !important;
		}

		aside .nav-sidebar .nav-link {
			color: #fff;
		}

		aside .nav-sidebar .nav-link:hover {
			color: #6754e9 !important;
			background-color: #fff !important;
		}
		.active-sidebar{
			color: #6754e9 !important;
			background-color: #fff !important;
		}
		.sst-sidebar-icon {
			width: 20px;
			height: auto;
		}
		/* no need for main header now. have sst-nav on top */
		.main-header{
			display: none !important;
		}
		/* dashboard card color */
		.small-box{
			background-color: #ebe8ff;
		}
		/* contaent-wrppaer background color */
		.content-wrapper{
			box-shadow: rgba(50, 50, 93, 0) 0px 30px 60px -12px inset, rgba(0, 0, 0, 0.3) 0px 18px 36px -18px inset;
		}
		.bg-content-gray{
			background-color: #fafafa !important;
		}
		.bg-content-white{
			background-color: #fff;
		}
		/* button color */
		.btn-sst{
			background-color: #6754e9 !important;
			color: #fff !important;
		}
		.btn-sst:hover{
			background-color: #6754e90a !important;
			color: #000 !important;
		}
		/* table styling */
		table{
			border: 0 !important;
		}
		th{
			border: 0 !important;
			border-bottom: 1px solid #eaeaea !important;
		}
		td{
			border: 0 !important;
			border-bottom: 1px solid #eaeaea !important;
		}
		tr{
			background-color: transparent !important;
		}
		/* table action links */
		.sst-action-a{
			color: #6754e9 !important;
			background-color: transparent !important;
		}
		.sst-action-a:hover{
			text-decoration: underline !important;
		}
		/* forms styles */
		.input-bg{
			background: #f9f9f9 !important;
		}
		
	</style>

</head>


<body class="hold-transition sidebar-mini layout-fixed">

	<!-- top nav -->

	<div class="sst-nav p-2 d-flex align-items-center justify-content-center">
		<div class="col-6">
			<img class="sst-header-logo" src="<?=ASSETS.'images/sst-logo.png'?>" alt="">
		</div>
		<div class="col-6">
			<ul class="navbar-nav  float-right">
				<li class="nav-item">
					<a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
				</li>
			</ul>
		</div>

	</div>



	<!-- main wrapper -->
	<div class="wrapper">

		<!-- Preloader -->
		<!-- <div class="preloader flex-column justify-content-center align-items-center">
      <img class="animation__shake" src="<?= ASSETS ?>assets/adminlte/dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
    </div> -->

		<!-- Navbar -->
		 <!-- have sst-nav at top no need for this now -->
		<nav class="main-header navbar navbar-expand navbar-white navbar-light">
			<!-- Left navbar links -->
			<ul class="navbar-nav">
				<li class="nav-item">
					<a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
				</li>
				<li class="nav-item d-none d-sm-inline-block">
					<a href="#" class="nav-link">Home</a>
				</li>
			</ul>

			<!-- Right navbar links -->
			<ul class="navbar-nav ml-auto">
				<!-- Navbar Search -->
				<li class="nav-item">
					<a class="nav-link" data-widget="navbar-search" href="#" role="button">
						<i class="fas fa-search"></i>
					</a>
					<div class="navbar-search-block">
						<form class="form-inline">
							<div class="input-group input-group-sm">
								<input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
								<div class="input-group-append">
									<button class="btn btn-navbar" type="submit">
										<i class="fas fa-search"></i>
									</button>
									<button class="btn btn-navbar" type="button" data-widget="navbar-search">
										<i class="fas fa-times"></i>
									</button>
								</div>
							</div>
						</form>
					</div>
				</li>

				<li class="nav-item">
					<a class="nav-link" data-widget="fullscreen" href="#" role="button">
						<i class="fas fa-expand-arrows-alt"></i>
					</a>
				</li>
			</ul>
		</nav>
		<!-- /.navbar -->
