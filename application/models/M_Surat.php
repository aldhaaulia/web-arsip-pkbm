<?php

class M_Surat extends CI_Model
{
    private $_table = "tr_surat";
    private $table_jenis = 'tm_jenis_surat';
    private $path_upload_file = './assets/Backend/uploads/';

    function __construct()
    {
        parent::__construct();
        parent::__construct();

        $this->sess_auth = $this->session->userdata('auth');
        // for current user only
        $this->upload_file_path_ = $this->path_upload_file . '/' . $this->sess_auth['user_dir'] . '/';
    }

    function getByid($a)
    {
        $this->db->select("a.id_surat,
        a.id_jenis_surat AS id_jenis_surat,
        b.nama_jenis AS jenis_surat,
        a.no_surat,
        a.asal_surat,
        if(a.tipe_surat = '1', 'Surat Masuk',IF(a.tipe_surat = '2', 'Surat Keluar', 'Tidak Diketahui')) AS tipe_surat,
        a.perihal,
        a.kepada,
        a.disposisi,
        a.file_berkas,
        a.lampiran,
        a.file_lampiran,
        c.nama AS create_by,
        c.user_dir as dir,
        DATE_FORMAT(a.create_date, '%d-%m-%Y') AS create_date");
        $this->db->from('tr_surat a');
        $this->db->join('tm_jenis_surat b', 'b.id_jenis_surat = a.id_jenis_surat', 'left');
        $this->db->join('tm_akun c', 'c.id_akun = a.create_by', 'left');
        $this->db->where('a.id_surat', $a);

        $query = $this->db->get();

        if ($query) {
            $data = $query->result_array()[0];
        }

        return $data;
    }

    function getSurat($a)
    {
        $this->db->select("a.id_surat,
        b.nama_jenis AS jenis_surat,
        a.no_surat,
        a.asal_surat,
        if(a.tipe_surat = '1', 'Surat Masuk',IF(a.tipe_surat = '2', 'Surat Keluar', 'Tidak Diketahui')) AS tipe_surat,
        a.perihal,
        a.kepada,
        a.lampiran,
        c.nama AS create_by,
        DATE_FORMAT(a.create_date, '%d-%m-%Y') AS create_date");
        $this->db->from('tr_surat a');
        $this->db->join('tm_jenis_surat b', 'b.id_jenis_surat = a.id_jenis_surat', 'left');
        $this->db->join('tm_akun c', 'c.id_akun = a.create_by', 'left');
        $this->db->where('a.tipe_surat', $a);
        $this->db->where('a.update_by', null);

        $query = $this->db->get();

        if ($query) {
            $data = $query->result_array();
        }

        return $data;
    }

    function getSuratDisposisi($a)
    {
        $this->db->select("a.id_surat,
        b.nama_jenis AS jenis_surat,
        a.no_surat,
        a.asal_surat,
        a.perihal,
        a.kepada,
        a.lampiran,
        a.disposisi,
        c.nama AS create_by,
        DATE_FORMAT(a.create_date, '%d-%m-%Y') AS create_date");
        $this->db->from('tr_surat a');
        $this->db->join('tm_jenis_surat b', 'b.id_jenis_surat = a.id_jenis_surat', 'left');
        $this->db->join('tm_akun c', 'c.id_akun = a.create_by', 'left');
        $this->db->where('a.tipe_surat', $a);
        $this->db->where('a.update_by is not null', null, false);
        $this->db->where('a.label', '0');

        $query = $this->db->get();

        if ($query) {
            $data = $query->result_array();
        }

        return $data;
    }

    public function getDokBiasa($a)
    {
        $this->db->select("a.id_surat,
        b.nama_jenis AS jenis_surat,
        a.no_surat,
        a.asal_surat,
        if(a.tipe_surat = '1', 'Surat Masuk',IF(a.tipe_surat = '2', 'Surat Keluar', 'Tidak Diketahui')) AS tipe_surat,
        a.perihal,
        a.kepada,
        a.disposisi,
        a.lampiran,
        c.nama AS create_by,
        DATE_FORMAT(a.create_date, '%d-%m-%Y') AS create_date");
        $this->db->from("tr_surat a");
        $this->db->join("tm_jenis_surat b", "b.id_jenis_surat = a.id_jenis_surat", "left");
        $this->db->join("tm_akun c", "c.id_akun = a.create_by", "left");
        $this->db->where("a.label", "1");
        $this->db->where('a.tipe_surat', $a);
        $this->db->where("a.is_delete", "0");
        $this->db->order_by("a.update_date", 'asc');

        $query = $this->db->get();

        if ($query) {
            $data = $query->result_array();
        }

        return $data;
    }

    function getDisposisiSurat($field, $value)
    {
        $this->db->select("a.id_surat,
        b.nama_jenis AS jenis_surat,
        a.no_surat,
        a.asal_surat,
        if(a.tipe_surat = '1', 'Surat Masuk',IF(a.tipe_surat = '2', 'Surat Keluar', 'Tidak Diketahui')) AS tipe_surat,
        a.perihal,
        a.kepada,
        a.disposisi,
        a.lampiran,
        c.nama AS create_by,
        DATE_FORMAT(a.create_date, '%d-%m-%Y') AS create_date");
        $this->db->from("tr_surat a");
        $this->db->join("tm_jenis_surat b", "b.id_jenis_surat = a.id_jenis_surat", "left");
        $this->db->join("tm_akun c", "c.id_akun = a.create_by", "left");
        $this->db->where("a.label", "0");
        $this->db->where('a.disposisi', "Belum Ada");
        $this->db->where('a.' . $field, $value);
        $this->db->order_by("a.update_date", 'asc');

        $query = $this->db->get();

        if ($query) {
            $data = $query->result_array();
        }

        return $data;
    }

    function getDisposisi($field, $value)
    {
        $this->db->select("a.id_surat,
        b.nama_jenis AS jenis_surat,
        a.no_surat,
        a.asal_surat,
        if(a.tipe_surat = '1', 'Surat Masuk',IF(a.tipe_surat = '2', 'Surat Keluar', 'Tidak Diketahui')) AS tipe_surat,
        a.perihal,
        a.kepada,
        a.disposisi,
        a.lampiran,
        c.nama AS create_by,
        DATE_FORMAT(a.create_date, '%d-%m-%Y') AS create_date");
        $this->db->from("tr_surat a");
        $this->db->join("tm_jenis_surat b", "b.id_jenis_surat = a.id_jenis_surat", "left");
        $this->db->join("tm_akun c", "c.id_akun = a.create_by", "left");
        $this->db->where("a.label", "0");
        $this->db->where('a.' . $field, $value);
        $this->db->order_by("a.update_date", 'asc');

        $query = $this->db->get();

        if ($query) {
            $data = $query->result_array();
        }

        return $data;
    }

    function save($a)
    {
        $sess_data = $this->session->userdata('auth');
        $id_akun  = $sess_data['id_akun'];

        $id_jenis_surat = $this->input->post('input_jenis_surat');
        $no_surat = $this->input->post('input_no_surat');
        $asal_surat_temp = $this->input->post('input_asal_surat');
        $tipe_surat = $a;
        $perihal = $this->input->post('input_perihal');
        $kepada = $this->input->post('input_kepada');
        $lampiran_temp = $this->input->post('input_lampiran');

        $disposisi = 'Belum ada';

        if ($asal_surat_temp == '') {
            $asal_surat = 'PKBM Negeri 30';
        } else {
            $asal_surat = $asal_surat_temp;
        }

        if ($lampiran_temp == '') {
            $lampiran = 'Tidak Ada Lampiran';
        } else {
            $lampiran = $lampiran_temp;
        }

        $create_by = $id_akun;

        date_default_timezone_set("Asia/Jakarta");
        $tgl_create = date('Y-m-d H:i:s');

        $data_akun = array(
            'id_jenis_surat' => $id_jenis_surat,
            'no_surat' => $no_surat,
            'asal_surat' => $asal_surat,
            'tipe_surat' => $tipe_surat,
            'perihal' => $perihal,
            'kepada' => $kepada,
            'disposisi' => $disposisi,
            'lampiran' => $lampiran,
            'create_by' => $create_by,
            'create_date' => $tgl_create
        );

        if (isset($_FILES['file_berkas'])) {
            $nameShort = 'berkas_';
            // $file_path = $this->path_upload_file.'/'.$this->sess_auth['user_dir'].'/';
            $config_upload = array(
                // 'upload_path' =>$file_path
            );

            $uploadData0 = $this->uploadsData('file_berkas', $config_upload, $nameShort);

            $res_uploadData0 = $uploadData0['data'];

            if ($uploadData0['success']) {
                $data_akun['file_berkas'] = $res_uploadData0['filename'];
            } else {
                // error
            }
        }

        if (isset($_FILES['file_lampiran'])) {
            $nameShort = 'lampiran_';
            // $file_path = $this->path_upload_file.'/'.$this->sess_auth['user_dir'].'/';
            $config_upload = array(
                // 'upload_path' =>$file_path
            );

            $uploadData1 = $this->uploadsData('file_lampiran', $config_upload, $nameShort);

            $res_uploadData1 = $uploadData1['data'];

            if ($uploadData1['success']) {
                $data_akun['file_lampiran'] = $res_uploadData1['filename'];
            } else {
                // error
            }
        }

        return $this->db->insert($this->_table, $data_akun);
    }

    function saveDisposisi()
    {
        $sess_data = $this->session->userdata('auth');
        $id_akun  = $sess_data['id_akun'];

        $id_surat = $this->input->post('input_id_surat');
        $jenis_surat = $this->input->post('input_jenis_surat');
        $disposisi = $this->input->post('input_disposisi');
        date_default_timezone_set("Asia/Jakarta");
        $update_date = date('Y-m-d H:i:s');

        $data = array(
            'id_jenis_surat' => $jenis_surat,
            'disposisi' => $disposisi,
            'update_date' => $update_date,
            'update_by' => $id_akun,
        );

        $where = array(
            'id_surat' => $id_surat
        );

        return $this->db->update('tr_surat', $data, $where);
    }

    function editSurat()
    {
        $sess_data = $this->session->userdata('auth');
        $id_akun  = $sess_data['id_akun'];

        $id_surat = $this->input->post('input_id_surat');
        $no_surat = $this->input->post('input_no_surat');
        $asal_surat = $this->input->post('input_asal_surat');
        $perihal = $this->input->post('input_perihal');
        $kepada_surat = $this->input->post('input_kepada_surat');
        date_default_timezone_set("Asia/Jakarta");
        $update_date = date('Y-m-d H:i:s');

        $data = array(
            'no_surat' => $no_surat,
            'asal_surat' => $asal_surat,
            'perihal' => $perihal,
            'kepada' => $kepada_surat,
            'update_date' => $update_date,
            'update_by' => $id_akun,
        );

        $where = array(
            'id_surat' => $id_surat
        );

        return $this->db->update('tr_surat', $data, $where);
    }

    function getJenisSurat()
    {
        $this->db->select('*');
        $this->db->from('tm_jenis_surat');

        $query = $this->db->get();

        if ($query) {
            $data = $query->result_array();
        }

        return $data;
    }

    function setLabel()
    {
        $sess_data = $this->session->userdata('auth');
        $id_akun  = $sess_data['id_akun'];

        $id_surat = $this->input->post('id_surat');
        $label = $this->input->post('input_label_surat');
        date_default_timezone_set("Asia/Jakarta");
        $update_date = date('Y-m-d H:i:s');

        $data = array(
            'label' => $label,
            'update_date' => $update_date,
            'update_by' => $id_akun,
        );

        $where = array(
            'id_surat' => $id_surat
        );

        return $this->db->update('tr_surat', $data, $where);
    }

    private function uploadsData($inputpostName, $config = array(), $nameShort = '')
    {

        $new_namez = $_FILES[$inputpostName]['name'];
        $new_name  = $nameShort . microtime(true) . '.' . substr(strtolower(strrchr($new_namez, ".")), 1);
        // $configz['file_name'] = $new_name;
        $configz = array(
            'file_name'     => $new_name,
            'upload_path'   => $this->upload_file_path_,
            // 'allowed_types' => 'gif|jpg|jpeg|png|bmp|pdf|doc',
            // 'encrypt_name' => true,
            'allowed_types' => '*',
            'max_size'      => '3000000',
            'remove_spaces' => true,
        );

        if (!empty($config)) {
            foreach ($config as $key => $value) {
                $configz[$key] = $value;
            }
        }


        $mkdir_path = $configz['upload_path'];

        // if(!file_exists($mkdir_path)){
        //     @mkdir($mkdir_path, 0755, TRUE);
        //     @chmod($mkdir_path, 0755);
        // }

        if (!is_dir($mkdir_path)) {
            // check directory is exist
            // create recursive directory
            // 0755 => without public write
            // 0777 => with public write

            @mkdir($mkdir_path, 0777, true);
        }

        // }

        $this->upload->initialize($configz);

        if (!$this->upload->do_upload($inputpostName)) {
            $error = $this->upload->display_errors();
            return array('success' => false, 'data' => $error);
        } else {
            $dataUpload = $this->upload->data();
            $data = array(
                'filename' => $dataUpload['file_name'],
                'filetype' => $dataUpload['file_type'],
                'filesize' => $dataUpload['file_size'],
            );

            return array('success' => true, 'data' => $data);
        }
    }

    public function getDokPenting()
    {
        $this->db->select("a.id_surat,
        b.nama_jenis AS jenis_surat,
        a.no_surat,
        a.asal_surat,
        if(a.tipe_surat = '1', 'Surat Masuk',IF(a.tipe_surat = '2', 'Surat Keluar', 'Tidak Diketahui')) AS tipe_surat,
        a.perihal,
        a.kepada,
        a.disposisi,
        a.lampiran,
        c.nama AS create_by,
        DATE_FORMAT(a.create_date, '%d-%m-%Y') AS create_date");
        $this->db->from("tr_surat a");
        $this->db->join("tm_jenis_surat b", "b.id_jenis_surat = a.id_jenis_surat", "left");
        $this->db->join("tm_akun c", "c.id_akun = a.create_by", "left");
        $this->db->where("a.label", "2");
        $this->db->where("a.is_delete", "0");
        $this->db->order_by("a.update_date", 'asc');

        $query = $this->db->get();

        if ($query) {
            $data = $query->result_array();
        }

        return $data;
    }

    public function delete($id)
    {
        // $where = array('id' => $id);

        // return $this->db->delete($this->_table, $where);

        $id_surat = $id;
        date_default_timezone_set("Asia/Jakarta");
        $tgl_update = date('Y-m-d H:i:s');
        $is_delete = 1;

        $data_surat = array(
            'is_delete' => $is_delete,
            'update_date' => $tgl_update
        );

        $where = array(
            'id_surat' => $id_surat
        );

        return $this->db->update($this->_table, $data_surat, $where);
    }

    function multiDelete($from_date, $to_date)
    {
        // $from_date = $this->input->post('from_date');
        // $to_date = $this->input->post('to_date');

        $query = $this->db->query('UPDATE tr_surat
        SET is_delete = 1
        WHERE label = 2 AND DATE_FORMAT(create_date, "%Y-%m-%d") BETWEEN "' . $from_date . '" AND "' . $to_date . '"');

        return $query;
    }

    function multiDelete1($from_date, $to_date, $tipe)
    {
        // $from_date = $this->input->post('from_date');
        // $to_date = $this->input->post('to_date');

        $query = $this->db->query('UPDATE tr_surat
        SET is_delete = 1
        WHERE label = 1 AND tipe_surat =  "' . $tipe . '" AND DATE_FORMAT(create_date, "%Y-%m-%d") BETWEEN "' . $from_date . '" AND "' . $to_date . '"');

        return $query;
    }

    function searchSurat($str)
    {
        $this->db->select("id_surat,
        no_surat,
        asal_surat,
        if(tipe_surat = '1', 'Surat Masuk',IF(tipe_surat = '2', 'Surat Keluar', 'Tidak Diketahui')) AS tipe_surat,
        perihal,
        kepada,
        lampiran,
        DATE_FORMAT(create_date, '%d-%m-%Y') AS create_date");
        $this->db->where("label", "0");
        $this->db->where("is_delete", "0");
        $this->db->group_start();
        $this->db->like('no_surat', $str);
        $this->db->or_like('perihal', $str);
        $this->db->group_end();
        $query = $this->db->get('tr_surat');
        return $query->result_array();
    }

    function cariSurat($str, $tipe)
    {
        $this->db->select("id_surat,
        no_surat,
        asal_surat,
        if(tipe_surat = '1', 'Surat Masuk',IF(tipe_surat = '2', 'Surat Keluar', 'Tidak Diketahui')) AS tipe_surat,
        IF( label = '1', 'Surat Biasa', IF( tipe_surat = '2', 'Surat Penting', 'Belum diberi label' ) ) AS label,
        perihal,
        kepada,
        lampiran,
        DATE_FORMAT(create_date, '%d-%m-%Y') AS create_date");
        $this->db->where("tipe_surat", $tipe);
        $this->db->where("is_delete", "0");
        $this->db->group_start();
        $this->db->like('no_surat', $str);
        $this->db->or_like('perihal', $str);
        $this->db->group_end();
        $query = $this->db->get('tr_surat');
        return $query->result_array();
    }

    // end of class
}
