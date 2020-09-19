<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';
class Jadwal extends REST_Controller {

	function __construct($config = 'rest') {
		parent::__construct($config);
		$this->load->library('encryption');
	}

	public function index_get()
	{
		$id_jadwal = $this->get('id_jadwal');
		if ($id_jadwal == '') {
			$this->db->select("jadwal.*, waktu.*, kelas.*, ruang.*, status.*, matakuliah.*");
			$this->db->from("jadwal");
			$this->db->join("waktu", "jadwal.id_waktu = waktu.id_waktu");
			$this->db->join("kelas", "jadwal.id_kelas = kelas.id_kelas");
			$this->db->join("ruang", "jadwal.id_ruang = ruang.id_ruang");
			$this->db->join("status", "jadwal.id_status = status.id_status");
			$this->db->join("matakuliah", "jadwal.id_matakuliah = matakuliah.id_matakuliah");
			$id_jadwal = $this->db->get('')->result();
		} else {
			$this->db->where('id_jadwal', $id_jadwal);
			$id_jadwal = $this->db->get('jadwal')->result();
		}
		$this->response($id_jadwal, 200);
	}

	function index_post() {
		$data = array(
			'id_ruang'	=> $this->post('id_ruang'),
			'id_kelas'	=> $this->post('id_kelas'),
			'id_waktu'	=> $this->post('id_waktu'),
			'id_status'	=> $this->post('id_status'),
			'id_matakuliah'	=> $this->post('id_matakuliah'));
		$insert = $this->db->insert('jadwal', $data);
		if ($insert) {
			$this->response($data, 200);
		} else {
			$this->response(array('status' => 'fail', 502));
		}
	}

	function index_put() {
        $id_jadwal = $this->put('id_jadwal');
        $data = array(
                    'id_jadwal'       => $id_jadwal,
					'id_ruang'     => $this->put('id_ruang'),
					'id_kelas'       => $this->put('id_kelas'),
					'id_waktu'       => $this->put('id_waktu'),
					'id_status'       => $this->put('id_status'),
					'id_matakuliah'	=> $this->put('id_matakuliah'));
        $this->db->where('id_jadwal', $id_jadwal);
        $update = $this->db->update('jadwal', $data);
        if ($update) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }

    function index_delete() {	
		$id_jadwal = $this->delete('id_jadwal');
		$this->db->where('id_jadwal', $id_jadwal);
		$delete = $this->db->delete('jadwal');
		if ($delete) {
			$this->response(array('status' => 'success'), 201);
		} else {
			$this->response(array('status' => 'fail', 502));
		}
	}
}

/* End of file jadwal.php */
/* Location: ./application/controllers/jadwal.php */