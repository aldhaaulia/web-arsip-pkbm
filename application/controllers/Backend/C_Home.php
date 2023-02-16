<?php

/**
 *
 * Created at 2022-05-25 10:57:05
 * Updated at
 *
 */

class C_Home extends MY_Controller {
	function __construct() {
		parent::__construct();
	}

	function index() {
		$get_settings = $this->my_model->get_setting();
		$data['setting'] = $get_settings;
		$this->load->view('backend/v_admin', $data);
	}

	// end of class
}
