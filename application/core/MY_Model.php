<?php

/**
 *
 * Created at 2022-06-09 12:58:50
 * Updated at
 *
 */

class MY_Model extends CI_Model {
	private $table_setting = 'tm_settings';

	function __construct() {
		parent::__construct();
	}

	function get_setting() {
		$new_data = array();

		$this->db->select('*');
		$this->db->from($this->table_setting);
		$get = $this->db->get();

		if ($get) {
			$data = $get->result_array();
			if (!empty($data)) {
				$path_logo = base_url().'assets/Backend/uploads/logo/';
				$path_about = base_url().'assets/Frontend/uploads/about/';
				$path_register = base_url().'assets/Frontend/uploads/register/';

				foreach ($data as $key => $val) {

					if($val['name'] == 'app_logo'){
						$app_logo = $val['value'];
						$val['value'] = $path_logo.$app_logo;
					}

					if($val['name'] == 'about_school_image'){
						$about_school_image = $val['value'];
						$val['value'] = $path_about.$about_school_image;
					}

					if($val['name'] == 'berkas_file_register'){
						$berkas_register_file = $val['value'];
						$val['value'] = $path_register.$berkas_register_file;
					}

					if($val['value'] == 'true'){
						$val['value'] = true;
					}
					elseif($val['value'] == 'false'){
						$val['value'] = false;
					}

					$new_data[] = $val;
				}
			}
		}


		// print_r($new_data);exit;

		if(!empty($new_data)){
			$new_data = array_column($new_data, 'value', 'name');
		}

		return $new_data;
	}

	// end of class
}
