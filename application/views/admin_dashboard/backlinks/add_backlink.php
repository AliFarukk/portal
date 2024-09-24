<?php require_once(APPPATH . 'views/admin_dashboard/inc/header.php'); ?>
<?php require_once(APPPATH . 'views/admin_dashboard/inc/sidebar.php'); ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper bg-content-white">

	<!-- Content Header (Page header) -->
	<div class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">


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
					<div class="d-flex flex-column pt-5 justify-content-center align-items-center">
						<div class="col-12 text-center">
							<h1 class="m-0">Add Backlink</h1>
						</div>
						<!-- /.card-header -->
						<!-- form start -->
						<form class="p-4 col-lg-6 col-sm-12" action="<?= BASE_URL . "backlink/save_backlink" ?>" method="post">
							<div class="form-group w-sm-100 w-lg-50">
								<label for="">Select Type</label>
								<select class="form-control form-control-sm input-bg" name="type" required>
									<option value="">select</option>
									<?php foreach ($types as $type) : ?>
										<option value="<?= $type->type_id ?>"><?= $type->type_name ?></option>
									<?php endforeach; ?>
								</select>

							</div>
							<!-- hidden for project-id -->
							<div class="form-group w-sm-100 w-lg-50">
								<input required type="text" name="project_id" value="<?= $project_id ?>" class="input-bg form-control" hidden>

							</div>

							<div class="form-group w-sm-100 w-lg-50">
								<label for="exampleInputEmail1">Referral Domain</label>
								<input required type="url" name="domain" class="input-bg form-control" placeholder="Domain">
							</div>

							<div class="form-group w-sm-100 w-lg-50">
								<label for="exampleInputEmail1">Link</label>
								<input required type="url" name="link" class="input-bg form-control" placeholder="Url">

							</div>

							<input name="submit" type="submit" value="Submit" class="btn btn-primary btn-sst mt-3">
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
