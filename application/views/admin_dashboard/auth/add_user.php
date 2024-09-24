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
					<?php if ($this->session->flashdata('password')) : ?>
						<div class="alert alert-danger alert-dismissible fade show" role="alert">
							<?php echo $this->session->flashdata('password'); ?>
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
					<?php endif; ?>
					<?php if ($this->session->flashdata('email')) : ?>
						<div class="alert alert-danger alert-dismissible fade show" role="alert">
							<?php echo $this->session->flashdata('email'); ?>
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
					<?php endif; ?>


					<!-- general form elements -->
					<div class="d-flex flex-column justify-content-center align-items-center">
						<div class="col-12 text-center">
							<h1 class="m-0">Add user</h1>
						</div>
						<!-- /.card-header -->
						<!-- form start -->
						<form class="p-4 col-lg-6 col-sm-12" action="<?= BASE_URL . "auth/save_user" ?>" method="post">
							<div class="form-group w-sm-100 w-lg-50">
								<label for="">Select Role</label>
								<select class="form-control form-control-sm input-bg" name="role" required>
									<option value="">select</option>
									<?php foreach ($roles as $role) : ?>
										<option value="<?= $role->role_id ?>"><?= $role->role_name ?></option>
									<?php endforeach; ?>
								</select>

							</div>

							<div class="form-group w-sm-100 w-lg-50">
								<label for="">Name</label>
								<input required type="text" name="name" class="input-bg form-control" placeholder="Name">

							</div>

							<div class="form-group w-sm-100 w-lg-50">
								<label for="">Email</label>
								<input required type="email" name="email" class="input-bg form-control" placeholder="Email">
							</div>

							<div class="form-group w-sm-100 w-lg-50">
								<label for="exampleInputEmail1">Password</label>
								<input required type="password" name="password" class="input-bg form-control" placeholder="Password">

							</div>
							<div class="form-group w-sm-100 w-lg-50">
								<label for="exampleInputEmail1">Confirm Password</label>
								<input required type="password" name="confirm_password" class="input-bg form-control" placeholder="Password">

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
