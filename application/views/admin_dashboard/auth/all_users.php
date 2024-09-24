<?php require_once(APPPATH . 'views/admin_dashboard/inc/header.php'); ?>
<?php require_once(APPPATH . 'views/admin_dashboard/inc/sidebar.php'); ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper bg-content-gray">

	<!-- Content Header (Page header) -->
	<div class="content-header">
		<div class="container-fluid">
			<div class="row mb-2 align-items-center">
				<div class="col-sm-6">
					<h1 class="m-0">Users</h1>
				</div>
				<div class="col-sm-6">
					<!-- add user -->
					<a class="btn btn-primary btn-sst m-1 float-lg-right float-sm-left" href="<?= BASE_URL . 'auth/add_user'; ?>">Add User</a>
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



					<!-- nothing found -->
					<?php if ($this->session->flashdata('e404')) : ?>
						<div class="alert alert-danger alert-dismissible fade show" role="alert">
							<?= $this->session->flashdata('e404') ?>
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
					<?php endif; ?>

					<!-- success -->
					<?php if ($this->session->flashdata('success')) : ?>
						<div class="alert alert-success alert-dismissible fade show" role="alert">
							<?= $this->session->flashdata('success') ?>
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
					<?php endif; ?>
					<!-- delete -->
					<?php if ($this->session->flashdata('delete')) : ?>
						<div class="alert alert-success alert-dismissible fade show" role="alert">
							<?= $this->session->flashdata('delete') ?>
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
					<?php endif; ?>


					<!-- general form elements -->
					<div class="card card-primary">

						<div class="card-body">
							<!-- Table start -->
							<table id="example1" class="table table-bordered table-striped">
								<thead>
									<tr>
										<th scope="col">ID</th>
										<th scope="col">Role</th>
										<th scope="col">Name</th>
										<th scope="col">Email</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
									<?php if (!empty($users)) : ?>
										<?php foreach ($users as $user) : ?>
											<tr>
												<td><?= $user->id ?></td>
												<td><?= $user->role_name ?></td>
												<td><?= $user->name ?></td>
												<td><?= $user->email ?></td>
												<td>
													<a title="Edit" class="sst-action-a" href="<?= BASE_URL . 'project/client_permissions/' . $user->id; ?>">View Permissions</a>
													<a title="Delete" class="ml-2" href="<?= BASE_URL . 'auth/delete/' . $user->id; ?>" onclick="return confirm('Are you sure you want to delete this user')"><img class="sst-sidebar-icon" src="<?= ASSETS . 'images/delete-icon.png' ?>" alt=""></a>
												</td>
											</tr>

										<?php endforeach; ?>
									<?php endif; ?>
								</tbody>
							</table>
						</div>

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
