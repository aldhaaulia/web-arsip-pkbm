<?php

$CI = &get_instance();

$sess_data = $this->session->userdata('auth');
$id_akun  = $sess_data['id_akun'];
$nama_user  = $sess_data['nama'];
$role  = $sess_data['role'];

$CI->load->model('M_Menu', 'm_menu');

?>

<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
	<!-- Brand Logo -->
	<a href="#" class="brand-link">
		<img src="<?= base_url('assets/backend'); ?>/dist/img/logo1.png" alt="Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
		<span class="brand-text font-weight-light">PKBM Negeri 30</span>
	</a>

	<!-- Sidebar -->
	<div class="sidebar">
		<!-- Sidebar user panel (optional) -->
		<div class="user-panel mt-3 pb-3 mb-3 d-flex">
			<div class="image">
				<img src="<?= base_url('assets/backend'); ?>/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
			</div>
			<div class="info">
				<a href="#" class="d-block"><?= $nama_user; ?></a>
			</div>
		</div>

		<!-- Sidebar Menu -->
		<nav class="mt-2">
			<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

				<?php $CI->m_menu->printMenu(); ?>


				<!-- <li class="nav-item">
					<a href="<? //= base_url('backend/home'); 
								?>" class="nav-link">
						<i class="nav-icon fas fa-th"></i>
						<p> Dashboard </p>
					</a>
				</li>

				<li class="nav-item">
					<a href="<? //= base_url('backend/berkas'); 
								?>" class="nav-link">
						<i class="nav-icon fas fa-file-invoice"></i>
						<p> Berkas </p>
					</a>
				</li> -->

				<?php //if ($role == '1' || $role == '2') : 
				?>
				<!-- <li class="nav-item">
						<a href="#" class="nav-link ">
							<i class="nav-icon fas fa-cogs"></i>
							<p>
								Web Management
								<i class="right fas fa-angle-left"></i>
							</p>
						</a>
						<ul class="nav nav-treeview">
							<li class="nav-item">
								<a href="#" class="nav-link ">
									<i class="nav-icon fas fa-cogs"></i>
									<p>
										Public
										<i class="right fas fa-angle-left"></i>
									</p>
								</a>
								<ul class="nav nav-treeview">
									<li class="nav-item">
										<a href="<?= base_url('backend/web_manage/slider'); ?>" class="nav-link">
											<i class="far fa-circle nav-icon"></i>
											<p>Slider</p>
										</a>
									</li>
										<li class="nav-item">
										<a href="<?= base_url('backend/web_manage/slider_fasilitas'); ?>" class="nav-link">
											<i class="far fa-circle nav-icon"></i>
											<p>Slider Fasilitas</p>
										</a>
									</li>
									<li class="nav-item">
										<a href="<?= base_url('backend/web_manage/about'); ?>" class="nav-link">
											<i class="far fa-circle nav-icon"></i>
											<p>About</p>
										</a>
									</li>
									<li class="nav-item">
										<a href="<?= base_url('backend/web_manage/contact'); ?>" class="nav-link">
											<i class="far fa-circle nav-icon"></i>
											<p>Contact</p>
										</a>
									</li>
								</ul>
							</li>
							<li class="nav-item">
								<a href="#" class="nav-link ">
									<i class="nav-icon fas fa-cogs"></i>
									<p>
										Office
										<i class="right fas fa-angle-left"></i>
									</p>
								</a>
								<ul class="nav nav-treeview">
									<li class="nav-item">
										<a href="<?= base_url('backend/web_manage/berkas'); ?>" class="nav-link">
											<i class="far fa-circle nav-icon"></i>
											<p>Berkas</p>
										</a>
									</li>
									<li class="nav-item">
										<a href="<?= base_url('backend/web_manage/web'); ?>" class="nav-link">
											<i class="far fa-circle nav-icon"></i>
											<p>Web</p>
										</a>
									</li>
								</ul>
							</li>
						</ul>
					</li> -->
				<?php //endif; 
				?>
			</ul>
		</nav>
		<!-- /.sidebar-menu -->
	</div>
	<!-- /.sidebar -->
</aside>