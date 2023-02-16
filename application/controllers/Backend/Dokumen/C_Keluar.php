<?php

/**
 *
 * Created at 2022-06-29 13:48:37
 * Updated at
 *
 */

class C_Keluar extends MY_Controller
{
    private $sess_data_auth;
    function __construct()
    {
        parent::__construct();
        $this->sess_data_auth = $this->get_session('auth');
    }


    function index()
    {
        $get_settings = $this->my_model->get_setting();
        $data['setting'] = $get_settings;

        // $id_akun  = $this->sess_data_auth['id_akun'];
        // $id_profile  = $this->sess_data_auth['id_profile'];
        // $id_role  = $this->sess_data_auth['role'];

        // $new_data = array();


        $this->load->view('backend/dokumen/keluar/v_surat_keluar_form', $data);
    }

    // end of class
}
