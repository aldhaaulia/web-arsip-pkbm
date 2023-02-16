<?php

/**
 *
 * Created at 2022-06-28 13:13:37
 * Updated at
 *
 */

class C_Masuk extends MY_Controller
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
		$data['surat'] = $this->m_surat->getSurat('1');
		$data['disposisi'] = $this->m_surat->getSuratDisposisi('1');
		$data['all'] = $this->m_surat->getDokBiasa('1');

		$this->load->view('backend/surat/masuk/v_surat_masuk', $data);
	}

	function getByid($a)
	{
		$data['disposisi'] = $this->m_surat->getByid($a);
		$this->load->view('backend/surat/v_surat_dtl', $data);
	}

	function add()
	{
		$get_settings = $this->my_model->get_setting();
		$data['setting'] = $get_settings;

		$this->load->view('backend/surat/masuk/v_surat_masuk_form', $data);
	}

	function editsurat()
	{
		$save = $this->m_surat->editSurat();
		if ($save) {
			$data['success'] = true;
			$data['msg'] = "Simpan Data Berhasil";
		} else {
			$data['success'] = false;
			$data['msg'] = "Gagal Menyimpan Data";
		}

		die(json_encode($data));
	}

	function savesurat()
	{
		$save = $this->m_surat->save('1');
		if ($save) {
			$data['success'] = true;
			$data['msg'] = "Simpan Data Berhasil";
		} else {
			$data['success'] = false;
			$data['msg'] = "Gagal Menyimpan Data";
		}

		die(json_encode($data));
	}

	function saveLabel()
	{
		$save = $this->m_surat->setLabel();
		if ($save) {
			$data['success'] = true;
			$data['msg'] = "Simpan Data Berhasil";
		} else {
			$data['success'] = false;
			$data['msg'] = "Gagal Menyimpan Data";
		}

		die(json_encode($data));
	}

	public function deleteMulti()
	{
		$from_date = $this->input->post('from_date');
		$to_date = $this->input->post('to_date');

		$delete = $this->m_surat->multiDelete1($from_date, $to_date, 1);
		if ($delete) {
			$data['success'] = true;
			$data['msg'] = "Data Berhasil Dihapus";
		} else {
			$data['success'] = false;
			$data['msg'] = "Gagal Menghapus Data";
		}

		die(json_encode($data));
	}

	function do_upload()
	{
		$config['upload_path'] = './assets/backend/uploads';
		$config['allowed_types'] = 'gif|jpg|png|pdf|doc|docx';

		$config['max_size'] = 5000;

		$this->load->library('upload', $config);
		$this->upload->do_upload();
		$hasil = $this->upload->data();

		$data = array('nama_file' => $hasil['file_name'], 'ukuran' => $hasil['file_size']);
		$this->db->insert($data);
	}

	function search_Surat()
	{
		$q = $this->input->post('q');
		$tipe = '1';
		$surat = $this->m_surat->cariSurat($q, $tipe);

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
