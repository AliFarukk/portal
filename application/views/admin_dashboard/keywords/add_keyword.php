<?php require_once(APPPATH . 'views/admin_dashboard/inc/header.php'); ?>
<?php require_once(APPPATH . 'views/admin_dashboard/inc/sidebar.php'); ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

	<!-- Content Header (Page header) -->
	<div class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1 class="m-0">Add Keyword</h1>
				</div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="#">Home</a></li>
						<li class="breadcrumb-item active">Add Keyword</li>
					</ol>
				</div>
			</div>
		</div>
	</div>
	<!-- /.content-header -->

	<!-- Main content -->
	<section class="content">
		<div class="container-fluid">
			<div class="row">
				<!-- left column -->
				<div class="col-lg-12">
					
					<?php if ($this->session->flashdata('errors')) : ?>
						<div class="alert alert-danger alert-dismissible fade show" role="alert">
							<?php echo $this->session->flashdata('errors'); ?>
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
					<?php endif; ?>


					<!-- general form elements -->
					<div class="card card-primary">
						<div class="card-header">
							<h3 class="card-title">Add Keyword</h3>
						</div>
						<!-- /.card-header -->
						<!-- form start -->
						<form class="p-4" action="<?= BASE_URL.'keyword/save_keyword' ?>" method="post">
							
							<!-- hidden for project-id -->
							<div class="form-group w-sm-100 w-lg-50">
								<input required type="text" name="project_id" value="<?=$project_id?>" class="form-control" hidden >

							</div>

							<div class="form-group w-sm-100 w-lg-50">
								<label for="exampleInputEmail1">Keyword</label>
								<input required type="text" name="keyword" class="form-control" placeholder="Keyword" >
							</div>
							<div class="form-group w-sm-100 w-lg-50">
								<label for="exampleInputEmail1">Initial Ranking</label>
								<input required type="text" name="ini_rank" class="form-control" placeholder="Initial ranking" >
							</div>
							<div class="form-group w-sm-100 w-lg-50">
								<label for="exampleInputEmail1">Current Ranking</label>
								<input required type="text" name="cur_rank" class="form-control" placeholder="Current ranking" >
							</div>
							

							<input name="submit" type="submit" value="Submit" class="btn btn-primary mt-3">
						</form>
					</div>
					<!-- /.card -->
				</div>
				<!--/.col (left) -->
			</div>
			<!-- /.row -->
		</div><!-- /.container-fluid -->
	</section>
	<!-- /.content -->


	<!-- /.content-wrapper -->
</div>
<!-- ./wrapper -->

<?php require_once(APPPATH . 'views/admin_dashboard/inc/footer.php'); ?>
