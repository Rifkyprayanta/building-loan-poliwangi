<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';
class Matkul extends REST_Controller {

	function __construct($config = 'rest') {
		parent::__construct($config);
	}

	public function index_get()
	{
		$id_matakuliah = $this->get('id_matakuliah');
		if ($id_matakuliah == '') {
			$this->db->select("matakuliah.*, kelas.*, ruang.*, waktu.*, date_format(waktu.jam_mulai, '%H:%i') as mulai, date_format(waktu.jam_selesai, '%H:%i') as selesai");
			$this->db->from("matakuliah");
			$this->db->join("kelas", "matakuliah.id_kelas = kelas.id_kelas");
			$this->db->join("ruang", "matakuliah.id_ruang = ruang.id_ruang");
			$this->db->join("waktu", "matakuliah.id_waktu = waktu.id_waktu");
			$this->db->order_by("matakuliah.id_matakuliah", "DESC");
			$id_matakuliah = $this->db->get('')->result();
		} else {
			$this->db->select("matakuliah.*, kelas.*, ruang.*, date_format(waktu.jam_mulai, '%H:%i') as mulai, date_format(waktu.jam_selesai, '%H:%i') as selesai");
			$this->db->from("matakuliah");
			$this->db->join("kelas", "matakuliah.id_kelas = kelas.id_kelas");
			$this->db->join("ruang", "matakuliah.id_ruang = ruang.id_ruang");
			$this->db->join("waktu", "matakuliah.id_waktu = waktu.id_waktu");
			$this->db->where('id_matakuliah', $id_matakuliah);
			$id_matakuliah = $this->db->get('')->result();
		}
		$this->response($id_matakuliah, 200);
	}

	function index_post() {
		$data = array(
			'nama_matkul'      =>  $this->post('nama_matkul'),
            'id_kelas'      =>  $this->post('id_kelas'),
        	'id_ruang'      =>  $this->post('id_ruang'),
        	'id_waktu'      =>  $this->post('id_waktu'),
        	'tahun_ajaran'      =>  $this->post('tahun_ajaran'),
        	'semester'      =>  $this->post('semester'));
		$insert = $this->db->insert('matakuliah', $data);
		if ($insert) {
			$this->response($data, 200);
		} else {
			$this->response(array('status' => 'fail', 502));
		}
	}

	function index_put() {
        $id_matakuliah = $this->put('id_matakuliah');
        $data = array(
                    'id_matakuliah' => $id_matakuliah,
                    'nama_matkul'	=> $this->put('nama_matkul'),
					'id_kelas'		=> $this->put('id_kelas'),
					'id_ruang'		=> $this->put('id_ruang'),
					'id_waktu'		=> $this->put('id_waktu'),
					'tahun_ajaran'	=> $this->put('tahun_ajaran'),
					'semester'		=> $this->put('semester'));
        $this->db->where('id_matakuliah', $id_matakuliah);
        $update = $this->db->update('matakuliah', $data);
        if ($update) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }

    function index_delete() {	
		$id_matakuliah = $this->delete('id_matakuliah');
		$this->db->where('id_matakuliah', $id_matakuliah);
		$delete = $this->db->delete('matakuliah');
		if ($delete) {
			$this->response(array('status' => 'success'), 201);
		} else {
			$this->response(array('status' => 'fail', 502));
		}
	}

}

/* End of file matkul.php */
/* Location: ./application/controllers/matkul.php */