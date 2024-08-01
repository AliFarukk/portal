<?php require_once(APPPATH . 'views/admin_dashboard/inc/header.php'); ?>
<?php require_once(APPPATH . 'views/admin_dashboard/inc/sidebar.php'); ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

	<!-- Content Header (Page header) -->
	<div class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1 class="m-0">Backlink Types</h1>
				</div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="#">Home</a></li>
						<li class="breadcrumb-item active">Backlink Types</li>
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
					<?php if ($this->session->flashdata('fail')) : ?>
						<div class="alert alert-danger alert-dismissible fade show" role="alert">
							<?= $this->session->flashdata('fail') ?>
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
							<h3 class="card-title">List of Backlink Types</h3>
						</div>
						<!-- /.card-header -->
						<div class="card-body">
							<!-- add project -->
							<div>
								<a class="btn btn-primary" href="<?= BASE_URL . 'type/add_type'; ?>">Add Type</a>
							</div>

							<!-- Table start -->
							<table id="example1" class="table table-bordered table-striped">
								<thead>
									<tr>
										<th scope="col">ID</th>
										<th scope="col">Type</th>
										<th>Action</th>


									</tr>
								</thead>
								<tbody>
								<?php foreach ($types as $ty) : ?>
										<tr>
											<td><?= $ty->type_id ?></td>
											<td><?= $ty->type_name ?></td>
											
											<td>
												<a class="btn btn-primary" href="<?=BASE_URL.'type/edit_type/'.$ty->type_id;?>">Edit</a> <br>
												<a class="btn btn-danger mt-1" href="<?=BASE_URL.'type/delete/'.$ty->type_id;?>" onclick="return confirm('Are you sure you want to delete this Type')">Delete</a>
												
											</td>
										</tr>

									<?php endforeach; ?>
									

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
