<?php

/**
 *
 * Created at 2022-06-28 13:13:37
 * Updated at
 *
 */

class C_Masuk extends MY_Controller {
	private $sess_data_auth;
	function __construct() {
		parent::__construct();
		$this->load->model('M_Surat', 'm_surat');
		$this->sess_data_auth = $this->get_session('auth');
	}


	function index() {
		$get_settings = $this->my_model->get_setting();
		$data['setting'] = $get_settings;

		// $id_akun  = $this->sess_data_auth['id_akun'];
		// $id_profile  = $this->sess_data_auth['id_profile'];
		// $id_role  = $this->sess_data_auth['role'];

		// $new_data = array();


		$this->load->view('backend/dokumen/masuk/v_surat_masuk_form', $data);
	}

	function masuk_save() {
		$save = $this->m_surat->masuk_save($dataSave);

		$data ['success'] = $save;

		if ($save) {
			$data ['msg'] = 'Berkas berhasil disimpan';
		} else {
			$data ['msg'] = 'Berkas gagal disimpan';
		}
		die(json_encode($data));
	}

	// end of class
}
