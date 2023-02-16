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
					<h1 class="m-0">Berkas</h1>
				</div><!-- /.col -->
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="#">Home</a></li>
						<li class="breadcrumb-item active">Berkas</li>
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
				<div class="col-lg-12">

					<div class="card card-primary card-outline">
						<div class="card-header">
							<h5 class="m-0">Informasi</h5>
						</div>
						<div class="card-body">

							<div class="row col-12 justify-content-md-center">
								<img src="<?= ((isset($setting['app_logo'])) ?  $setting['app_logo'] : ''); ?>" alt="Logo" class="img-fluid brand-image" style="width:200px;">
							</div>
							<div class="">

								<div class="form-group">
									<label for="input_school_name">Status</label>
									<input type="text" class="form-control" value="<?= $status_verifikasi; ?>" readonly>
								</div>

								<div class="form-group">
									<label for="input_school_name">No Registrasi</label>
									<input type="text" class="form-control" value="<?= $no_registrasi; ?>" readonly>
								</div>

								<?php if ($is_show_download_button) : ?>
									<button type="button" class="btn btn-primary" id="btn_unduh"><i class="fas fa-download"></i> Unduh Berkas</button>
								<?php endif; ?>

							</div>

						</div>
					</div>

				</div>
				<!-- /.col-md-6 -->
			</div>
			<!-- /.row -->
		</div><!-- /.container-fluid -->
	</div>
	<!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?php $this->load->view('Backend/Parts/footer'); ?>


<script>
	<?php if ($is_show_download_button) : ?>
	$('#btn_unduh').on('click', function(e) {
		window.location.href = base_url + "backend/berkas/unduh/" + '<?= $id_verifikasi; ?>';
		return false;
	});
	<?php endif; ?>
</script>
