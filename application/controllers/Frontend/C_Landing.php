<?php

/**
 *
 * Created at 2022-05-24 15:48:23
 * Updated at
 *
 */

class C_Landing extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('M_Landing', 'm_landing');
	}

	function index()
	{
		$data = array();
		$get_settings = $this->m_landing->get_setting();
		$get_slider = $this->m_landing->get_slider();
		$get_slider_fasilitas = $this->m_landing->get_slider_fasilitas();

		$data['slider'] = $get_slider;
		$data['slider_fasilitas'] = $get_slider_fasilitas;
		$data['setting'] = $get_settings;

		// print_r($data);exit;

		$this->load->view('Frontend/v_index', $data);
	}

	// end of class
}
