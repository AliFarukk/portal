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

					<?php if ($this->session->flashdata('email_exist')) : ?>
						<div class="alert alert-danger alert-dismissible fade show" role="alert">
							<?php echo $this->session->flashdata('email_exist'); ?>
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
					<?php endif; ?>
					<?php if ($this->session->flashdata('success')) : ?>
						<div class="alert alert-success alert-dismissible fade show" role="alert">
							<?php echo $this->session->flashdata('success'); ?>
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


					<!-- general form elements -->
					<div class="d-flex flex-column justify-content-center align-items-center">
						<div class="col-12 text-center">
							<h1 class="m-0">Edit Profile</h1>
						</div>
						<!-- /.card-header -->
						<!-- form start -->
						<form class="p-4 col-lg-6 col-sm-12" action="<?= BASE_URL . "auth/update_profile" ?>" method="post">
							
							<div class="form-group w-sm-100 w-lg-50">
								<label for="">Name</label>
								<input type="text" name="name" value="<?=$user->name?>" class="input-bg form-control" placeholder="Name">

							</div>

							<div class="form-group w-sm-100 w-lg-50">
								<label for="">Email</label>
								<input type="email" name="email" value="<?=$user->email?>" class="input-bg form-control" placeholder="Email">
							</div>
							<span class="bg-info p-1 rounded">You can leave password empty if you dont want to change it.</span>
							<div class="form-group w-sm-100 w-lg-50">
								<label for="exampleInputEmail1">New password</label>
								<input type="password" name="password" class="input-bg form-control" placeholder="Password">

							</div>
							<div class="form-group w-sm-100 w-lg-50">
								<label for="exampleInputEmail1">Confirm New Password</label>
								<input type="password" name="confirm_password" class="input-bg form-control" placeholder="Password">

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
