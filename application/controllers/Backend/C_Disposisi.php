<?php

/**
 *
 * Created at 2022-06-29 14:35:37
 * Updated at
 *
 */

class C_Disposisi extends MY_Controller
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
        $data['masuk'] = $this->m_surat->getDisposisiSurat('tipe_surat', '1');
        $data['keluar'] = $this->m_surat->getDisposisiSurat('tipe_surat', '2');
        $data['disposisi'] = $this->m_surat->getDisposisi('disposisi !=', 'belum ada');

        $this->load->view('backend/disposisi/v_disposisi', $data);
    }

    function getByid($a)
    {
        $data['disposisi'] = $this->m_surat->getByid($a);
        $this->load->view('backend/disposisi/v_disposisi_form', $data);
    }

    public function updateDisposisi()
    {
        $save = $this->m_surat->saveDisposisi();
        if ($save) {
            $data['success'] = true;
            $data['msg'] = "Simpan Data Berhasil";
        } else {
            $data['success'] = false;
            $data['msg'] = "Gagal Menyimpan Data";
        }

        die(json_encode($data));
    }

    function search_Surat()
    {
        $q = $this->input->post('q');
        $surat = $this->m_surat->searchSurat($q);

        if (!empty($surat)) {
            $r['status'] = true;
            $r['data'] = $surat;
        } else {
            $r['status'] = false;
            $r['msg'] = 'Data Kosong';
        }

        // die(json_encode($r));
        header('Content-type: application/json');
        http_response_code('200');
        echo json_encode($r);
    }

    // end of class
}
