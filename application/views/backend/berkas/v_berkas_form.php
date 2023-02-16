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
						<li class="breadcrumb-item"><a href="#">Master</a></li>
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
							<h5 class="card-title">Data Berkas</h5>
						</div>
						<div class="card-body">

							<form class="form-horizontal" id="frm_berkas">

								<div class="form-group row">
									<label for="input_name_submitter" class="col-sm-2 col-form-label">Nama Submitter</label>
									<div class="col-sm-8">
										<input type="text" class="form-control" id="input_name_submitter" name="input_name_submitter" placeholder="Nama Submitter">
									</div>
								</div>

								<div class="form-group row">
									<label for="input_name" class="col-sm-2 col-form-label">Nama Siswa</label>
									<div class="col-sm-8">
										<input type="text" class="form-control" id="input_name" name="input_name" placeholder="Nama Siswa">
									</div>
								</div>

								<div class="form-group row">
									<label for="input_NISN" class="col-sm-2 col-form-label">NISN Siswa</label>
									<div class="col-sm-8">
										<input type="text" class="form-control" id="input_NISN" name="input_NISN" placeholder="NISN Siswa">
									</div>
								</div>

								<div class="form-group row">
									<label for="input_tempat_lahir" class="col-sm-2 col-form-label">Tanggal Lahir</label>
									<div class="col-md-3">
										<input type="date" class="form-control" id="input_tanggal_lahir" name="input_tanggal_lahir" placeholder="Tanggal Lahir">
									</div>
								</div>

								<div class="form-group row">
									<label for="file_berkas" class="col-sm-2 col-form-label">Upload Biodata</label>
									<div class="col-md-10 row">
										<div class="col-sm-8">
											<input type="file" class="form-control" id="file_berkas" name="file_berkas" placeholder="Berkas">
										</div>
										<div class="col-sm-8">
											<span class="helper">*Berkas yang di unduh pada saat registrasi</span>
										</div>
									</div>
								</div>

								<div class="form-group row">
									<label for="file_akta_kelahiran" class="col-sm-2 col-form-label">Upload Akta Kelahiran</label>
									<div class="col-md-10 row">
										<div class="col-sm-8">
											<input type="file" class="form-control" id="file_akta_kelahiran" name="file_akta_kelahiran" placeholder="Akta Kelahiran">
										</div>
									</div>
								</div>

								<div class="form-group row">
									<label for="file_kartu_keluarga" class="col-sm-2 col-form-label">Upload Kartu Keluarga</label>
									<div class="col-md-10 row">
										<div class="col-sm-8">
											<input type="file" class="form-control" id="file_kartu_keluarga" name="file_kartu_keluarga" placeholder="Kartu Keluarga">
										</div>
									</div>
								</div>

								<div class="form-group row">
									<label for="file_raport" class="col-sm-2 col-form-label">Upload Raport</label>
									<div class="col-md-10 row">
										<div class="col-sm-8">
											<input type="file" class="form-control" id="file_raport" name="file_raport" placeholder="Raport">
										</div>
									</div>
								</div>

								<div class="form-group row">
									<label for="file_ijazah" class="col-sm-2 col-form-label">Upload Ijazah</label>
									<div class="col-md-10 row">
										<div class="col-sm-8">
											<input type="file" class="form-control" id="file_ijazah" name="file_ijazah" placeholder="Ijazah">
										</div>
									</div>
								</div>

								<div class="helper">
									<p>*Upload berkas ukuran maksimal 2 Mb</p>
								</div>

							</form>

						</div>

						<div class="card-footer">
							<button type="button" class="btn btn-primary" id="btn_save">Save</button>
						</div>

					</div><!-- /.card -->
				</div>

			</div>
			<!-- /.row -->
		</div><!-- /.container-fluid -->
	</div>
	<!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?php $this->load->view('Backend/Parts/footer'); ?>

<script>
	var Toast = Swal.mixin({
		toast: true,
		position: 'top-end',
		showConfirmButton: false,
		timer: 3000
	});

	$('#btn_save').on('click', function(e) {
		var link_ = base_url + 'backend/berkas/berkas_save';

		var form = $('#frm_berkas');
		var data = form.serializeArray();
		var formHtml = form[0];
		var NewData = new FormData(formHtml);

		$.ajax({
			url: link_,
			type: "POST",
			data: NewData,
			dataType: "JSON",
			contentType: false,
			cache: false,
			processData: false
		}).done(function(response) {

			if (response.success) {
				Toast.fire({
					icon: 'success',
					title: response.msg
				});

				setTimeout(() => {
					window.location.reload();
				}, 300);

			} else {
				Toast.fire({
					icon: 'error',
					title: response.msg
				});
			}
		});
	});
</script>
