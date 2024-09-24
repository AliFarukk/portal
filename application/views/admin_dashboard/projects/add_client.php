<?php require_once(APPPATH . 'views/admin_dashboard/inc/header.php'); ?>
<?php require_once(APPPATH . 'views/admin_dashboard/inc/sidebar.php'); ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper bg-content-white">

	<!-- Content Header (Page header) -->
	<div class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<!-- <div class="col-sm-6">
					<h1 class="m-0">Add Client</h1>
				</div> -->

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
					<?php if ($this->session->flashdata('errors')): ?>
						<div class="alert alert-danger alert-dismissible fade show" role="alert">
							<?php echo $this->session->flashdata('errors'); ?>
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
					<div class="d-flex flex-column pt-5 justify-content-center align-items-center ">
						<div class="col-12 text-center">
							<h1 class="m-0">Add Client</h1>
						</div>
						<!-- /.card-header -->
						<!-- form start -->
						<form class="p-4 col-lg-6 col-sm-12" action="<?= BASE_URL . "project/save_client" ?>" method="post">
							<div class="form-group w-sm-100 w-lg-50">
								<label for="">Select Project</label>
								<select class="form-control form-control-sm input-bg" name="project" required>
									<option value="">select</option>
									<?php foreach ($projects as $project) : ?>
										<option value="<?= $project->project_id ?>"><?= $project->project_name ?></option>
									<?php endforeach; ?>
								</select>
							</div>
							<div class="form-group w-sm-100 w-lg-50">
								<label for="">Select User</label>
								<select class="form-control form-control-sm input-bg" name="user" required>
									<option value="">select</option>
									<?php foreach ($users as $user) : ?>
										<option value="<?= $user->id ?>"><?= $user->name ?></option>
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
