<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';
class StatusRuanganL2 extends REST_Controller {

	function __construct($config = 'rest') {
		parent::__construct($config);
		$this->load->library('encryption');
	}

	public function index_get()
	{
		$id_jadwal = $this->get('id_jadwal');
		if ($id_jadwal == '') {
			$this->db->select("jadwal.*, waktu.*, kelas.*, ruang.*, status.*");
			$this->db->from("jadwal");
			$this->db->join("waktu", "jadwal.id_waktu = waktu.id_waktu");
			$this->db->join("kelas", "jadwal.id_kelas = kelas.id_kelas");
			$this->db->join("ruang", "jadwal.id_ruang = ruang.id_ruang");
			$this->db->join("status", "jadwal.id_status = status.id_status");
			$this->db->where('ruang.id_lantai', 2);
			$id_jadwal = $this->db->get('')->result();
		} else {
			$this->db->where('ruang.id_lantai', 2);
			$id_jadwal = $this->db->get('jadwal')->result();
		}
		$this->response($id_jadwal, 200);
	}

}

/* End of file statusRuanganL1.php */
/* Location: ./application/controllers/statusRuanganL1.php */