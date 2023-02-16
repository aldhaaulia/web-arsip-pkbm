<?php

/**
 *
 * Created at 2022-05-30 11:13:27
 * Updated at
 *
 */

class C_Register extends CI_Controller {
	function __construct() {
		parent::__construct();
		$this->load->model('Auth/M_Register', 'm_register');
		$this->load->model('MY_Model', 'my_model');
	}


	function index() {
		$list_setting = $this->my_model->get_setting();

		if($list_setting['is_register_login_open']){
			$this->load->view('auth/v_register');
		}else{

			redirect('landing','refresh');

		}

	}

	function proses_register() {
		return $this->m_register->register_save();
	}

	function unduh($file) {
		$data_temp = $this->m_register->get_setting();

		if ($file == 'biodata') {
			$filename_berkas = $data_temp['berkas_file_register'];

			$path_to_file = $filename_berkas;
			$expFilename = explode("/", $path_to_file);
			$file_name = $expFilename[count($expFilename) - 1];
			$file_content = file_get_contents($path_to_file);

			force_download($file_name, $file_content);
		}
	}

	// end of class
}
