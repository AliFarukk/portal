<?php require_once(APPPATH . 'views/admin_dashboard/inc/header.php'); ?>
<?php require_once(APPPATH . 'views/admin_dashboard/inc/sidebar.php'); ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

	<!-- Content Header (Page header) -->
	<div class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1 class="m-0">Projects Keywords</h1>
				</div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="#">Home</a></li>
						<li class="breadcrumb-item active">Keywords</li>
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



					<!-- nothing found -->
					<?php if ($this->session->flashdata('404')) : ?>
						<div class="alert alert-success alert-dismissible fade show" role="alert">
							<?= $this->session->flashdata('404') ?>
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
						<div class="card-header">
							<h3 class="card-title">List of Keywords</h3>
						</div>
						<!-- /.card-header -->
						<div class="card-body">
							<!-- add keyword -->
							<?php if ($this->session->userdata('user_session')->role_id == 1): ?>
								<div>
									<a class="btn btn-primary" href="<?= BASE_URL . 'keyword/add_keyword/' . $project_id; ?>">Add Keyword</a>
								</div>
							<?php endif; ?>

							<!-- Table start -->
							<table id="example1" class="table table-bordered table-striped">
								<thead>
									<tr>
										<th scope="col">ID</th>
										<th scope="col">Keyword</th>
										<th scope="col">Intial Ranking</th>
										<th scope="col">Current Ranking</th>
										<?php if ($this->session->userdata('user_session')->role_id == 1): ?>
											<th>Action</th>
										<?php endif; ?>


									</tr>
								</thead>
								<tbody>
									<?php if (!empty($keywords)) : ?>
										<?php foreach ($keywords as $key) : ?>
											<tr>
												<td><?= $key->keyword_id ?></td>
												<td><?= $key->keyword ?></td>
												<td><?= $key->initial_ranking ?></td>
												<td><?= $key->current_ranking ?></td>
												<?php if ($this->session->userdata('user_session')->role_id == 1): ?>
													<td>
														<a class="btn btn-primary" href="<?= BASE_URL . 'keyword/edit_keyword/' . $key->keyword_id ?>">Edit</a> <br>
														<a class="btn btn-danger mt-1" href="<?= BASE_URL . 'keyword/delete/' . $key->keyword_id ?>" onclick="return confirm('Are you sure you want to delete this keyword')">Delete</a>
													</td>
												<?php endif; ?>
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
