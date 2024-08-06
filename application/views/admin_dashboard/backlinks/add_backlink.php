<?php require_once(APPPATH . 'views/admin_dashboard/inc/header.php'); ?>
<?php require_once(APPPATH . 'views/admin_dashboard/inc/sidebar.php'); ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

	<!-- Content Header (Page header) -->
	<div class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1 class="m-0">Add Backlink</h1>
				</div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="#">Home</a></li>
						<li class="breadcrumb-item active">Add Backlink</li>
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
							<h3 class="card-title">Add Backlink</h3>
						</div>
						<!-- /.card-header -->
						<!-- form start -->
						<form class="p-4" action="<?= BASE_URL . "backlink/save_backlink" ?>" method="post">
							<div class="form-group w-sm-100 w-lg-50">
								<label for="">Select Type</label>
								<select class="form-control form-control-sm" name="type" required>
									<option value="">select</option>
									<?php foreach($types as $type) :?>
										<option value="<?=$type->type_id?>"><?= $type->type_name ?></option>
									<?php endforeach;?>
								</select>

							</div>
							<!-- hidden for project-id -->
							<div class="form-group w-sm-100 w-lg-50">
								<input required type="text" name="project_id" value="<?=$project_id?>" class="form-control" hidden >

							</div>

							<div class="form-group w-sm-100 w-lg-50">
								<label for="exampleInputEmail1">Referral Domain</label>
								<input required type="url" name="domain" class="form-control" placeholder="Domain" >
							</div>
							
							<div class="form-group w-sm-100 w-lg-50">
								<label for="exampleInputEmail1">Link</label>
								<input required type="url" name="link" class="form-control" placeholder="Url" >

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
