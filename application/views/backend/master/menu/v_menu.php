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
					<h1 class="m-0">Menu</h1>
				</div><!-- /.col -->
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="#">Home</a></li>
						<li class="breadcrumb-item"><a href="#">Master</a></li>
						<li class="breadcrumb-item active">Menu</li>
					</ol>
				</div><!-- /.col -->
			</div><!-- /.row -->
		</div><!-- /.container-fluid -->
	</div>
	<!-- /.content-header -->

	<!-- Main content -->
	<div class="content">
		<div class="container-fluid">



			<div class="card card-primary card-outline">
				<div class="card-header">
					<h5 class="card-title">Menu</h5>
				</div>
				<div class="card-body">
					<div class="row">

						<div class="col-md-6">
							<div class="card">
								<div class="card-header">
									<h4>Menu List</h4>
								</div>
								<div class="card-body">
									<ul id="myEditor" class="sortableLists list-group">
									</ul>
								</div>

							</div>
						</div>

						<div class="col-md-6">
							<div class="card">
								<div class="card-header">
									<h4>Menu List Configuration</h4>
								</div>
								<div class="card-body">
									<button type="button" class="btn btn-success" id="btn_load"> Load From DB</button>

									<div class="card border-primary mb-3">
										<div class="card-header bg-primary text-white">Edit item</div>
										<div class="card-body">

											<form id="frmEdit" class="form-horizontal">
												<input type="hidden" class="form-control item-menu" name="id" id="input_id">
												<input type="hidden" class="form-control item-menu" name="parent_id" id="input_parent_id">

												<div class="form-group">
													<label for="text">Nama Menu</label>
													<div class="input-group">
														<input type="text" class="form-control item-menu" name="text" id="input_text" placeholder="Nama Menu">
														<div class="input-group-append">
															<button type="button" id="myEditor_icon" class="btn btn-outline-secondary" role="iconpicker"></button>
														</div>
													</div>
													<input type="hidden" name="icon" id="input_icon" class="item-menu">
												</div>
												<div class="form-group">
													<label for="input_url">URL</label>
													<input type="text" id="input_url" name="url" class="form-control item-menu" placeholder="URL">
												</div>

												<div class="form-group">
													<label for="ket">Keterangan</label>
													<input type="text" id="input_ket" name="ket" class="form-control item-menu" placeholder="Keterangan">
												</div>
											</form>

										</div>
										<div class="card-footer">
											<button type="button" id="btnUpdate" class="btn btn-primary" disabled><i class="fas fa-sync-alt"></i> Update</button>
											<button type="button" id="btnAdd" class="btn btn-success"><i class="fas fa-plus"></i> Add</button>
										</div>
									</div>

								</div>

							</div>


						</div>

						<div class="col-md-12">
							<div class="card">
								<div class="card-header">
									<h4>Outpu JSON</h4>
								</div>
								<div class="card-body">
									<div class="form-group">
										<button id="btn_output" class="btn btn-success">Get Output</button>
										<button id="btn_save" class="btn btn-primary">Save</button>
									</div>

									<div class="form-group">
										<label class="form-label">Output</label>
										<textarea id="txt_output" class="form-control" style="height: 150px !important;"></textarea>
									</div>

								</div>

							</div>
						</div>
					</div>

				</div>
			</div><!-- /.card -->
		</div>

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

	// Begin of Menu Editor
	// MenuEditor cannot initialize by variable null

	// icon picker options
	var iconPickerOptions = {
		searchText: "Search...",
		labelHeader: "{0}/{1}"
	};
	// sortable list options
	var sortableListOptions = {
		placeholderCss: {
			'background-color': "#CCC"
		}
	};

	var editor_menu = new MenuEditor('myEditor', {
		listOptions: sortableListOptions,
		iconPicker: iconPickerOptions
	});
	// var editor_menu = new MenuEditor('myEditor');

	editor_menu.setForm($('#frmEdit'));
	editor_menu.setUpdateButton($('#btnUpdate'));

	$("#btnUpdate").click(function() {
		editor_menu.update();
		clearForm();
	});



	$('#btn_load').on('click', function(e) {
		getData();
	});

	$('#btn_output').on('click', function(e) {
		var str = editor_menu.getString();
		$("#txt_output").text(str);
	});

	$('#btnAdd').click(async function() {

		var input_id = $('#input_id').val();
		var input_parent_id = $('#input_parent_id').val();

		var input_text = $('#input_text').val();
		var input_icon = $('#input_icon').val();
		var input_url = $('#input_url').val();
		var input_ket = $('#input_ket').val();

		var data = {
			id: 0,
			parent_id: 0,
			text: input_text,
			icon: input_icon,
			url: input_url,
			ket: input_ket
		};

		var is_saved = await saveData(data, true);

		if (is_saved.success) {
			Toast.fire({
				icon: 'success',
				title: is_saved.msg
			});

			editor_menu.add();
			clearForm();
			getData();
		} else {
			Toast.fire({
				icon: 'error',
				title: is_saved.msg
			});
		}


	});

	$('#btn_save').on('click', async function(e) {
		var str = JSON.parse(editor_menu.getString());
		var is_saved = await saveData(str,true);
		if (is_saved.success) {
			Toast.fire({
				icon: 'success',
				title: is_saved.msg
			});
			clearForm();
			getData();

		} else {
			Toast.fire({
				icon: 'error',
				title: is_saved.msg
			});
		}
	});


	// End of Menu Editor

	function clearForm() {
		$('#frmEdit')[0].reset();
		$('#input_id').val('');
		$('#input_parent_id').val('');
	}

	async function saveData(data, is_result = false) {
		var NewData = new FormData();

		NewData.append('dataJson[]', JSON.stringify(data));
		// NewData.append('table', 'menu');
		// NewData.append('opsi', 'json');
		// NewData.append('other', 'sort');


		return $.ajax({
			url: base_url + "backend/master/menu/save",
			type: "POST",
			dataType: "JSON",
			data: NewData,
			contentType: false,
			cache: false,
			processData: false,
		}).then(function(response) {
			if (is_result) {
				return response;
			} else {
				if (response.success) {
					Toast.fire({
						icon: 'success',
						title: response.msg
					});
				} else {
					Toast.fire({
						icon: 'error',
						title: response.msg
					});
				}
			}
		});



	}

	function getData() {
		var NewData = new FormData();
		// NewData.append('opsi', 'json');

		$.ajax({
			url: base_url + "backend/master/menu/getJson",
			type: "POST",
			dataType: "JSON",
			data: NewData,
			contentType: false,
			cache: false,
			processData: false,
		}).done(function(response) {
			editor_menu.setData([]);
			if (response.success) {
				var responses_data = response.data;
				editor_menu.setData(responses_data);
			}
		});

	}

</script>
