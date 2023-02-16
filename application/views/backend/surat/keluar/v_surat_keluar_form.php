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
					<h1 class="m-0">Surat Keluar</h1>
				</div><!-- /.col -->
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="<?= base_url('backend/home'); ?>">Home</a></li>
						<li class="breadcrumb-item"><a href="#">Dokumen</a></li>
						<li class="breadcrumb-item"><a href="<?= base_url('backend/dokumen/keluar'); ?>">Surat Keluar</a></li>
						<li class="breadcrumb-item active">Tambah</li>
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
							<h5 class="card-title">Dokumen - Surat Keluar</h5>
						</div>
						<div class="card-body">

							<form class="form-horizontal" id="frm_berkas">

								<div class="form-group row">
									<label for="input_no_surat" class="col-sm-2 col-form-label">No Surat</label>
									<div class="col-sm-8">
										<input type="text" class="form-control" id="input_no_surat" name="input_no_surat" placeholder="No Surat">
									</div>
								</div>

								<div class="form-group row">
									<label for="input_kepada" class="col-sm-2 col-form-label">Tujuan Surat</label>
									<div class="col-sm-8">
										<input type="text" class="form-control" id="input_kepada" name="input_kepada" placeholder="Tujuan Surat">
									</div>
								</div>

								<!-- <div class="form-group row">
									<label for="input_tipe_surat" class="col-sm-2 col-form-label">Tipe Surat</label>
									<div class="col-sm-8">
										<select name="input_tipe_surat" id="input_tipe_surat" class="form-control" style="width:100%;">
											<option value="1">Surat Masuk</option>
											<option value="2">Surat Keluar</option>
										</select>
									</div>
								</div> -->

								<div class="form-group row">
									<label for="input_jenis_surat" class="col-sm-2 col-form-label">Jenis Surat</label>
									<div class="col-sm-8">
										<select name="input_jenis_surat" id="input_jenis_surat" class="form-control" style="width:100%;">
											<!-- <option value="1">Urgent</option>
											<option value="2">Biasa</option>
											<option value="3">Rahasia</option> -->
										</select>
									</div>
								</div>

								<!-- <div class="form-group row">
									<label for="input_tempat_lahir" class="col-sm-2 col-form-label">Tanggal Lahir</label>
									<div class="col-md-3">
										<input type="date" class="form-control" id="input_tanggal_lahir" name="input_tanggal_lahir" placeholder="Tanggal Lahir">
									</div>
								</div> -->

								<div class="form-group row">
									<label for="input_perihal" class="col-sm-2 col-form-label">Perihal</label>
									<div class="col-sm-8">
										<input type="text" class="form-control" id="input_perihal" name="input_perihal" placeholder="Perihal">
									</div>
								</div>

								<div class="form-group row">
									<label for="file_berkas" class="col-sm-2 col-form-label">Upload Berkas</label>
									<div class="col-md-10 row">
										<div class="col-sm-8">
											<input type="file" class="form-control" id="file_berkas" name="file_berkas" placeholder="Berkas">
										</div>
										<div class="col-sm-8">
											<span class="helper">*Ukuran Berkas maksimal 2MB</span>
										</div>
									</div>
								</div>

								<div class="form-group row">
									<label for="input_lampiran" class="col-sm-2 col-form-label">Lampiran</label>
									<div class="col-sm-8">
										<input type="text" class="form-control" id="input_lampiran" name="input_lampiran" placeholder="Lampiran">
									</div>
								</div>

								<div class="form-group row">
									<label for="file_lampiran" class="col-sm-2 col-form-label">Upload Lampiran</label>
									<div class="col-md-10 row">
										<div class="col-sm-8">
											<input type="file" class="form-control" id="file_lampiran" name="file_lampiran" placeholder="Lampiran">
										</div>
										<div class="col-sm-8">
											<span class="helper">*Ukuran lampiran maksimal 2MB</span>
										</div>
									</div>
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
	$(document).ready(function() {
		get_jenisSurat();
	});

	var Toast = Swal.mixin({
		toast: true,
		position: 'top-end',
		showConfirmButton: false,
		timer: 3000
	});


	function get_jenisSurat() {
		var link_ = base_url + 'getjenissurat';
		var auto = $('#input_jenis_surat');

		$.ajax({
			url: link_,
			type: "POST",
			data: '',
			dataType: "JSON",
			contentType: false,
			cache: false,
			processData: false
		}).done(function(response) {
			auto.empty();
			auto.append('<option value="" hidden>-Pilih Jenis Surat-</option>');
			if (response.success) {
				$.each(response.data, function(i, j) {
					auto.append('<option value="' + j.id_jenis_surat + '">' + j.nama_jenis + '</option>');
				});
			}
		});
	}

	$('#btn_save').on('click', function(e) {
		var link_ = base_url + 'backend/dokumen/keluar/savesurat';

		var form = $('#frm_berkas');
		var data = form.serializeArray();
		console.log(data);
		var formHtml = form[0];
		var NewData = new FormData(formHtml);

		var no_surat = $('#input_no_surat').val();
		var tujuan_surat = $('#input_tujuan_surat').val();
		var jenis_surat = $('#input_jenis_surat').val();
		var perihal = $('#input_perihal').val();
		var lampiran = $('#input_lampiran').val();

		var is_valid = false;

		if (no_surat != '' && tujuan_surat != '' && jenis_surat != '' && perihal != '' && lampiran != '') {
			is_valid = true;
		} else {
			is_valid = false;
		}

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