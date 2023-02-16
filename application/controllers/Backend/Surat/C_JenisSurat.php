<?php

/**
 *
 * Created at 2022-06-28 13:13:37
 * Updated at
 *
 */

class C_JenisSurat extends MY_Controller
{
    private $sess_data_auth;
    function __construct()
    {
        parent::__construct();
        $this->load->model('M_Surat', 'm_surat');
    }

    function Get()
    {
        $get = $this->m_surat->getJenisSurat();

        if ($get != null) {
            $r['success'] = true;
            $r['data'] = $get;
        } else {
            $r['success'] = false;
            $r['msg'] = 'Data kosong';
        }
        die(json_encode($r));
    }

    // end of class
}
