<?php require_once(APPPATH . 'views/admin_dashboard/inc/header.php'); ?>
<?php require_once(APPPATH . 'views/admin_dashboard/inc/sidebar.php'); ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

	<!-- Content Header (Page header) -->
	<div class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1 class="m-0">Dashboard</h1>
				</div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="#">Home</a></li>
						<li class="breadcrumb-item active">Dashboard</li>
					</ol>
				</div>
			</div>
		</div>
	</div>
	<!-- /.content-header -->

	<!-- Main content -->
	<section class="content">
		<div class="container-fluid">
			<!-- Small boxes (Stat box) -->

			<div class="row">
				<?php if (!empty($projects)) : ?>
					<?php foreach ($projects as $project): ?>
						<div class="col-lg-3 col-6">
							<!-- small box -->
							<div class="small-box bg-info">
								<div class="inner">
									<h3><?=$project->project_name?></h3>
									<p class="mb-1">Total Backlinks: <?=$project->total_backlinks?></p>
									<p>Total Keywords: <?=$project->total_keywords?></p>
								</div>
								<!-- <div class="icon">
									<i class="ion ion-bag"></i>
								</div> -->
							</div>
						</div>
					<?php endforeach; ?>
				<?php else: ?>
					<div class="text-center mt-3 p-3">
						Sorry, No projects assinged yet
					</div>
				<?php endif; ?>

			</div>
		</div>
</div>
</section>

<!-- /.content-wrapper -->
</div>
<!-- ./wrapper -->

<?php require_once(APPPATH . 'views/admin_dashboard/inc/footer.php'); ?>
