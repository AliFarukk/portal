 <!-- Main Sidebar Container -->
 <aside class="main-sidebar sidebar-dark-primary elevation-4">
 	<!-- Brand Logo -->
 	<!-- <a href="<?= BASE_URL ?>" class="brand-link"> -->
 		<!-- <img src="<?= BASE_URL ?>assets/images/logo.jpg" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8"> -->
 		<!-- <span class="brand-text font-weight-light text-white">Portal</span> -->
 	<!-- </a> -->

 	<!-- Sidebar -->
 	<div class="sidebar">
 		<!-- Sidebar user panel (optional) -->
 		<div class="user-panel mt-5 pb-3 mb-3 d-flex border-0">
 			<div class="image">
 				<img src="<?= ASSETS ?>adminlte/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
 			</div>
 			<div class="info">
 				<a class="text-white" href="#" class="d-block"><?= $this->session->userdata('user_session')->name; ?></a>
 			</div>
 		</div>

 		<!-- Sidebar Menu -->
 		<nav class="mt-2">
 			<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
 				<!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
 				<li class="nav-item">
 					<a href="<?= BASE_URL . 'dashboard'; ?>" class="nav-link <?= (strpos(current_url(),'dashboard') !== false) ? "active-sidebar": "" ;?>">
 						<i class="nav-icon">
 							<img class="sst-sidebar-icon" src="<?= ASSETS . 'images/dashboard-icon.png' ?>">
 						</i>
 						<p>
 							Dashboard
 						</p>
 					</a>
 				</li>
 				<li class="nav-item">
 					<a href="<?= BASE_URL . 'project'; ?>" class="nav-link <?= (strpos(current_url(),'project') !== false) ? "active-sidebar": "" ;?>">
 						<i class="nav-icon">
 							<img class="sst-sidebar-icon" src="<?= ASSETS . 'images/chart-square.png' ?>">
 						</i>
 						<p>
 							Projects
 						</p>
 					</a>
 				</li>
 				<?php if ($this->session->userdata('user_session')->role_id == 1): ?>
 					<li class="nav-item">
 						<a href="<?= BASE_URL . 'type/all_types'; ?>" class="nav-link <?= (strpos(current_url(),'type') !== false) ? "active-sidebar": "" ;?>">
 							<i class="nav-icon">
 								<img class="sst-sidebar-icon" src="<?= ASSETS . 'images/link-icon.png' ?>">
 							</i>
 							<p>
 								Link Types
 							</p>
 						</a>
 					</li>
 					<li class="nav-item">
 						<a href="<?= BASE_URL . 'auth/users'; ?>" class="nav-link <?= ((strpos(current_url(),'auth/users') !== false) || (strpos(current_url(),'auth/add_user') !== false)) ? "active-sidebar": "" ;?>">
 							<i class="nav-icon">
 								<img class="sst-sidebar-icon" src="<?= ASSETS . 'images/user-square.png' ?>">
 							</i>
 							<p>
 								Users
 							</p>
 						</a>
 					</li>
 				<?php endif; ?>
 				<li class="nav-item">
 					<a href="<?= BASE_URL . 'auth/edit_profile' ?>" class="nav-link <?= (strpos(current_url(),'edit_profile') !== false) ? "active-sidebar": "" ;?>">
 						<i class="nav-icon">
 							<img class="sst-sidebar-icon" src="<?= ASSETS . 'images/user-square.png' ?>">
 						</i>
 						<p>
 							Profile
 						</p>
 					</a>
 				</li>
 				<li class="nav-item">
 					<a href="<?= BASE_URL . 'auth/logout' ?>" class="nav-link">
 						<i class="nav-icon">
 							<img class="sst-sidebar-icon" src="<?= ASSETS . 'images/logout-icon.png' ?>">
 						</i>
 						<p>
 							Logout
 						</p>
 					</a>
 				</li>

 			</ul>
 		</nav>
 		<!-- /.sidebar-menu -->
 	</div>
 	<!-- /.sidebar -->
 </aside>
