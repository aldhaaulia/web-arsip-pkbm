<?php

/**
 *
 * Created at 2022-06-29 14:35:37
 * Updated at
 *
 */

class C_Doc_Penting extends MY_Controller
{
    private $sess_data_auth;
    function __construct()
    {
        parent::__construct();
        $this->sess_data_auth = $this->get_session('auth');
        $this->load->model('M_Surat', 'm_surat');
    }


    function index()
    {
        $get_settings = $this->my_model->get_setting();
        $data['setting'] = $get_settings;
        $data['surat'] = $this->m_surat->getDokPenting();

        $this->load->view('backend/surat/dokumen/v_doc_penting', $data);
        // $this->load->view('backend/surat/dokumen/v_doc_penting');
    }

    function getByid($a)
    {
        $data['disposisi'] = $this->m_surat->getByid($a);
        $this->load->view('backend/surat/dokumen/v_dtl_doc', $data);
    }

    public function deleteSurat()
    {
        $id = $this->input->post('id_surat');

        $delete = $this->m_surat->delete($id);
        if ($delete) {
            $data['success'] = true;
            $data['msg'] = "Data Berhasil Dihapus";
        } else {
            $data['success'] = false;
            $data['msg'] = "Gagal Menghapus Data";
        }

        die(json_encode($data));
    }

    public function deleteMulti()
    {
        $from_date = $this->input->post('from_date');
        $to_date = $this->input->post('to_date');

        $delete = $this->m_surat->multiDelete($from_date, $to_date, 2);
        if ($delete) {
            $data['success'] = true;
            $data['msg'] = "Data Berhasil Dihapus";
        } else {
            $data['success'] = false;
            $data['msg'] = "Gagal Menghapus Data";
        }

        die(json_encode($data));
    }

    // end of class
}
