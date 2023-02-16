<?php

$this->load->view('Backend/Parts/header');
$this->load->view('Backend/Parts/navbar_main');
$this->load->view('Backend/Parts/sidebar');

?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<div class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1 class="m-0">Dashboard</h1>
				</div><!-- /.col -->
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="<?= base_url('backend/home'); ?>">Home</a></li>
						<li class="breadcrumb-item active">Dashboard</li>
					</ol>
				</div><!-- /.col -->
			</div><!-- /.row -->
		</div><!-- /.container-fluid -->
	</div>
	<!-- /.content-header -->

	<!-- Main content -->
	<div class="content">
		<div class="container-fluid">
			<div class="row">
				<!-- Area Chart -->
				<div class="col-xl col-lg">
					<div class="card shadow mb-4">
						<!-- Card Body -->
						<div class="card-body">
							<div class="text-center">
								<img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 11rem;" src="<?= base_url('assets/backend'); ?>/dist/img/logo1.png" alt="...">
							</div>
							<h1 style="text-align:center;"><?= ((isset($setting['app_name'])) ?  $setting['app_name'] : ''); ?></h1>
							<p style="text-align:center;"><?= ((isset($setting['school_desc'])) ?  $setting['school_desc'] : ''); ?></p>
							<p style="text-align:center;"><?= ((isset($setting['contact_address'])) ?  $setting['contact_address'] : ''); ?></p>
							<p style="text-align: center;"><?= ((isset($setting['contact_phone'])) ?  $setting['contact_phone'] : '') . ', ' . ((isset($setting['contact_email'])) ?  $setting['contact_email'] : ''); ?></p>
						</div>
					</div>
				</div>

			</div>
			<!-- /.row -->
		</div><!-- /.container-fluid -->
	</div>
	<!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?php $this->load->view('Backend/Parts/footer'); ?>