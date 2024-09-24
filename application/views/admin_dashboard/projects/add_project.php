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
					<?php if (validation_errors()): ?>
						<div class="alert alert-danger alert-dismissible fade show" role="alert">
							<?php echo validation_errors(); ?>
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
					<?php endif; ?>
					<?php if ($this->session->flashdata('price')): ?>
						<div class="alert alert-danger alert-dismissible fade show" role="alert">
							<?php echo $this->session->flashdata('price'); ?>
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
					<?php endif; ?>
					<!-- general form elements -->
					<div class="d-flex flex-column pt-5 justify-content-center align-items-center">
						<div class="col-12 text-center">
							<h1 class="m-0">Add Project</h1>
						</div>
						<!-- /.card-header -->
						<!-- form start -->
						<form class="p-4 col-lg-6 col-sm-12" action="<?= BASE_URL . "project/save_project" ?>" method="post">
							<div class="form-group w-sm-100 w-lg-50">
								<label for="exampleInputEmail1">Project Name</label>
								<input type="text" name="name" class="form-control input-bg" placeholder="Name">

							</div>
							<div class="form-group w-sm-100 w-lg-50">
								<label for="">Select Status</label>
								<select class="form-control form-control-sm input-bg" name="status" required>
									<option value="">select</option>
									<?php foreach ($status as $s) : ?>
										<option value="<?= $s->id ?>"><?= $s->status ?></option>
									<?php endforeach; ?>
								</select>
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
