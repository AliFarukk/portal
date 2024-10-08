<?php require_once(APPPATH . 'views/admin_dashboard/inc/header.php'); ?>
<?php require_once(APPPATH . 'views/admin_dashboard/inc/sidebar.php'); ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper bg-content-gray">

	<!-- Content Header (Page header) -->
	<div class="content-header">
		<div class="container-fluid">
			<div class="row mb-2 align-items-center">
				<div class="col-sm-6">
					<h1 class="m-0">Projects List</h1>
				</div>
				<div class="col-sm-6">
					<!-- <ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="#">Home</a></li>
						<li class="breadcrumb-item active">Projects</li>
					</ol> -->
					<!-- add project -->
					<?php if ($this->session->userdata('user_session')->role_id == 1): ?>

						<a class="btn btn-primary btn-sst m-1 float-lg-right float-sm-left" href="<?= BASE_URL . 'project/add_project' ?>">Add Project</a>
						<a class="btn btn-primary btn-sst m-1 float-lg-right float-sm-left" href="<?= BASE_URL . 'project/add_client' ?>">Add Client in Project</a>

					<?php endif; ?>
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
					<!-- nothing found -->
					<?php if ($this->session->flashdata('fail')) : ?>
						<div class="alert alert-danger alert-dismissible fade show" role="alert">
							<?= $this->session->flashdata('fail') ?>
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
						<!-- <div class="card-header">
							<h3 class="card-title">List of Projects</h3>
						</div> -->
						<!-- /.card-header -->
						<div class="card-body">
							<!-- Table start -->
							<table id="example1" class="table table-bordered table-striped">
								<thead>
									<tr>
										<th scope="col">ID</th>
										<th scope="col">Name</th>
										<th scope="col">Status</th>
										<th>Action</th>


									</tr>
								</thead>
								<tbody>
									<?php if (!empty($projects)) : ?>
										<?php foreach ($projects as $project) : ?>
											<tr>
												<td><?= $project->project_id ?></td>
												<td><?= $project->project_name ?></td>
												<td><?= $project->status ?></td>
												<td>
													<a class="sst-action-a" href="<?= BASE_URL . 'backlink/all_backlinks/' . $project->project_id ?>">view backlinks</a>
													<a class="sst-action-a ml-2" href="<?= BASE_URL . 'keyword/all_keywords/' . $project->project_id ?>">view keywords</a>
													<?php if ($this->session->userdata('user_session')->role_id == 1): ?>
														<a title="Edit" class="ml-2" href="<?= BASE_URL . 'project/edit_project/' . $project->project_id ?>"><img class="sst-sidebar-icon" src="<?= ASSETS . 'images/edit-icon.png' ?>" alt=""></a>
														<a title="Delete" class="ml-2" href="<?= BASE_URL . 'project/delete/' . $project->project_id ?>" onclick="return confirm('Are you sure you want to delete this project')"><img class="sst-sidebar-icon" src="<?= ASSETS . 'images/delete-icon.png' ?>" alt=""></a>
														<br>
													<?php endif; ?>
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
