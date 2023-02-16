<?php

/**
 *
 * Created at 2022-06-09 11:43:45
 * Updated at
 *
 */

class M_Landing extends MY_Model {
	private $table_slider = 'tm_slider';
	private $table_slider_fasilitas = 'tm_slider_fasilitas';
	function __construct() {
		parent::__construct();
	}

	function get_slider() {
		$new_data = array();

		$this->db->select('*');
		$this->db->from($this->table_slider);
		$this->db->where('is_active', '1');
		$get = $this->db->get();

		if ($get) {
			$data = $get->result_array();
			if (!empty($data)) {
				$path_slider = base_url().'assets/Frontend/uploads/slider/';
				foreach ($data as $key => $val) {
					$image = $path_slider.$val['image'];
					$val['image'] = $image;
					$new_data[] = $val;
				}
			}
		}
		return $new_data;
	}

	function get_slider_fasilitas() {
		$new_data = array();

		$this->db->select('*');
		$this->db->from($this->table_slider_fasilitas);
		$this->db->where('is_active', '1');
		$get = $this->db->get();

		if ($get) {
			$data = $get->result_array();
			if (!empty($data)) {
				$path_slider = base_url().'assets/Frontend/uploads/slider_fasilitas/';
				foreach ($data as $key => $val) {
					$image = $path_slider.$val['image'];
					$val['image'] = $image;
					$new_data[] = $val;
				}
			}
		}
		return $new_data;
	}

	// end of class
}
