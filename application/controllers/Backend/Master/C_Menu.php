<?php

/**
 *
 * Created at 2022-06-23 15:40:33
 * Updated at
 *
 */

class C_Menu extends MY_Controller {
	function __construct() {
		parent::__construct();
		$this->load->model('M_Menu', 'm_menu');
	}

	function index() {
		$this->load->view('backend/master/menu/v_menu');
	}

	function getJson() {
		$this->m_menu->getJson();
	}

	function save(){
		$this->m_menu->save();
	}

	// end of class
}
