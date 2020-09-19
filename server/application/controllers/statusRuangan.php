<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';
class StatusRuangan extends REST_Controller {

	function __construct($config = 'rest') {
		parent::__construct($config);
		$this->load->library('encryption');
	}

	public function gedungAlantai1_get()
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
			$this->db->where('ruang.id_lantai', 1);
			$id_jadwal = $this->db->get('')->result();
		} else {
			$this->db->select("jadwal.*, waktu.*, kelas.*, ruang.*, status.*, matakuliah.*");
			$this->db->from("jadwal");
			$this->db->join("waktu", "jadwal.id_waktu = waktu.id_waktu");
			$this->db->join("kelas", "jadwal.id_kelas = kelas.id_kelas");
			$this->db->join("ruang", "jadwal.id_ruang = ruang.id_ruang");
			$this->db->join("status", "jadwal.id_status = status.id_status");
			$this->db->join("matakuliah", "jadwal.id_matakuliah = matakuliah.id_matakuliah");
			$this->db->where('ruang.id_lantai', 1);
			$this->db->where('jadwal.id_jadwal', $id_jadwal);
			$id_jadwal = $this->db->get('')->result();
		}
		$this->response($id_jadwal, 200);
	}

	public function gedungAlantai2_get()
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
			$this->db->where('ruang.id_lantai', 2);
			$id_jadwal = $this->db->get('')->result();
		} else {
			$this->db->select("jadwal.*, waktu.*, kelas.*, ruang.*, status.*, matakuliah.*");
			$this->db->from("jadwal");
			$this->db->join("waktu", "jadwal.id_waktu = waktu.id_waktu");
			$this->db->join("kelas", "jadwal.id_kelas = kelas.id_kelas");
			$this->db->join("ruang", "jadwal.id_ruang = ruang.id_ruang");
			$this->db->join("status", "jadwal.id_status = status.id_status");
			$this->db->join("matakuliah", "jadwal.id_matakuliah = matakuliah.id_matakuliah");
			$this->db->where('ruang.id_lantai', 2);
			$this->db->where('jadwal.id_jadwal', $id_jadwal);
			$id_jadwal = $this->db->get('')->result();
		}
		$this->response($id_jadwal, 200);
	}

	public function gedungAlantai3_get()
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
			$this->db->where('ruang.id_lantai', 3);
			$id_jadwal = $this->db->get('')->result();
		} else {
			$this->db->select("jadwal.*, waktu.*, kelas.*, ruang.*, status.*, matakuliah.*");
			$this->db->from("jadwal");
			$this->db->join("waktu", "jadwal.id_waktu = waktu.id_waktu");
			$this->db->join("kelas", "jadwal.id_kelas = kelas.id_kelas");
			$this->db->join("ruang", "jadwal.id_ruang = ruang.id_ruang");
			$this->db->join("status", "jadwal.id_status = status.id_status");
			$this->db->join("matakuliah", "jadwal.id_matakuliah = matakuliah.id_matakuliah");
			$this->db->where('ruang.id_lantai', 3);
			$this->db->where('jadwal.id_jadwal', $id_jadwal);
			$id_jadwal = $this->db->get('')->result();
		}
		$this->response($id_jadwal, 200);
	}

	public function gedungAlantai4_get()
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
			$this->db->where('ruang.id_lantai', 4);
			$id_jadwal = $this->db->get('')->result();
		} else {
			$this->db->select("jadwal.*, waktu.*, kelas.*, ruang.*, status.*, matakuliah.*");
			$this->db->from("jadwal");
			$this->db->join("waktu", "jadwal.id_waktu = waktu.id_waktu");
			$this->db->join("kelas", "jadwal.id_kelas = kelas.id_kelas");
			$this->db->join("ruang", "jadwal.id_ruang = ruang.id_ruang");
			$this->db->join("status", "jadwal.id_status = status.id_status");
			$this->db->join("matakuliah", "jadwal.id_matakuliah = matakuliah.id_matakuliah");
			$this->db->where('ruang.id_lantai', 4);
			$this->db->where('jadwal.id_jadwal', $id_jadwal);
			$id_jadwal = $this->db->get('')->result();
		}
		$this->response($id_jadwal, 200);
	}

	public function gedungBlantai1_get()
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
			$this->db->where('ruang.id_lantai', 5);
			$id_jadwal = $this->db->get('')->result();
		} else {
			$this->db->select("jadwal.*, waktu.*, kelas.*, ruang.*, status.*, matakuliah.*");
			$this->db->from("jadwal");
			$this->db->join("waktu", "jadwal.id_waktu = waktu.id_waktu");
			$this->db->join("kelas", "jadwal.id_kelas = kelas.id_kelas");
			$this->db->join("ruang", "jadwal.id_ruang = ruang.id_ruang");
			$this->db->join("status", "jadwal.id_status = status.id_status");
			$this->db->join("matakuliah", "jadwal.id_matakuliah = matakuliah.id_matakuliah");
			$this->db->where('ruang.id_lantai', 5);
			$this->db->where('jadwal.id_jadwal', $id_jadwal);
			$id_jadwal = $this->db->get('')->result();
		}
		$this->response($id_jadwal, 200);
	}

	public function gedungBlantai2_get()
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
			$this->db->where('ruang.id_lantai', 6);
			$id_jadwal = $this->db->get('')->result();
		} else {
			$this->db->select("jadwal.*, waktu.*, kelas.*, ruang.*, status.*, matakuliah.*");
			$this->db->from("jadwal");
			$this->db->join("waktu", "jadwal.id_waktu = waktu.id_waktu");
			$this->db->join("kelas", "jadwal.id_kelas = kelas.id_kelas");
			$this->db->join("ruang", "jadwal.id_ruang = ruang.id_ruang");
			$this->db->join("status", "jadwal.id_status = status.id_status");
			$this->db->join("matakuliah", "jadwal.id_matakuliah = matakuliah.id_matakuliah");
			$this->db->where('ruang.id_lantai', 6);
			$this->db->where('jadwal.id_jadwal', $id_jadwal);
			$id_jadwal = $this->db->get('')->result();
		}
		$this->response($id_jadwal, 200);
	}

	public function gedungBlantai3_get()
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
			$this->db->where('ruang.id_lantai', 7);
			$id_jadwal = $this->db->get('')->result();
		} else {
			$this->db->select("jadwal.*, waktu.*, kelas.*, ruang.*, status.*, matakuliah.*");
			$this->db->from("jadwal");
			$this->db->join("waktu", "jadwal.id_waktu = waktu.id_waktu");
			$this->db->join("kelas", "jadwal.id_kelas = kelas.id_kelas");
			$this->db->join("ruang", "jadwal.id_ruang = ruang.id_ruang");
			$this->db->join("status", "jadwal.id_status = status.id_status");
			$this->db->join("matakuliah", "jadwal.id_matakuliah = matakuliah.id_matakuliah");
			$this->db->where('ruang.id_lantai', 7);
			$this->db->where('jadwal.id_jadwal', $id_jadwal);
			$id_jadwal = $this->db->get('')->result();
		}
		$this->response($id_jadwal, 200);
	}

	public function gedungBlantai4_get()
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
			$this->db->where('ruang.id_lantai', 8);
			$id_jadwal = $this->db->get('')->result();
		} else {
			$this->db->select("jadwal.*, waktu.*, kelas.*, ruang.*, status.*, matakuliah.*");
			$this->db->from("jadwal");
			$this->db->join("waktu", "jadwal.id_waktu = waktu.id_waktu");
			$this->db->join("kelas", "jadwal.id_kelas = kelas.id_kelas");
			$this->db->join("ruang", "jadwal.id_ruang = ruang.id_ruang");
			$this->db->join("status", "jadwal.id_status = status.id_status");
			$this->db->join("matakuliah", "jadwal.id_matakuliah = matakuliah.id_matakuliah");
			$this->db->where('ruang.id_lantai', 8);
			$this->db->where('jadwal.id_jadwal', $id_jadwal);
			$id_jadwal = $this->db->get('')->result();
		}
		$this->response($id_jadwal, 200);
	}

	public function gedungBlantai5_get()
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
			$this->db->where('ruang.id_lantai', 9);
			$id_jadwal = $this->db->get('')->result();
		} else {
			$this->db->select("jadwal.*, waktu.*, kelas.*, ruang.*, status.*, matakuliah.*");
			$this->db->from("jadwal");
			$this->db->join("waktu", "jadwal.id_waktu = waktu.id_waktu");
			$this->db->join("kelas", "jadwal.id_kelas = kelas.id_kelas");
			$this->db->join("ruang", "jadwal.id_ruang = ruang.id_ruang");
			$this->db->join("status", "jadwal.id_status = status.id_status");
			$this->db->join("matakuliah", "jadwal.id_matakuliah = matakuliah.id_matakuliah");
			$this->db->where('ruang.id_lantai', 9);
			$this->db->where('jadwal.id_jadwal', $id_jadwal);
			$id_jadwal = $this->db->get('')->result();
		}
		$this->response($id_jadwal, 200);
	}

	public function gedungClantai1_get()
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
			$this->db->where('ruang.id_lantai', 10);
			$id_jadwal = $this->db->get('')->result();
		} else {
			$this->db->select("jadwal.*, waktu.*, kelas.*, ruang.*, status.*, matakuliah.*");
			$this->db->from("jadwal");
			$this->db->join("waktu", "jadwal.id_waktu = waktu.id_waktu");
			$this->db->join("kelas", "jadwal.id_kelas = kelas.id_kelas");
			$this->db->join("ruang", "jadwal.id_ruang = ruang.id_ruang");
			$this->db->join("status", "jadwal.id_status = status.id_status");
			$this->db->join("matakuliah", "jadwal.id_matakuliah = matakuliah.id_matakuliah");
			$this->db->where('ruang.id_lantai', 10);
			$this->db->where('jadwal.id_jadwal', $id_jadwal);
			$id_jadwal = $this->db->get('')->result();
		}
		$this->response($id_jadwal, 200);
	}

	public function gedungClantai2_get()
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
			$this->db->where('ruang.id_lantai', 11);
			$id_jadwal = $this->db->get('')->result();
		} else {
			$this->db->select("jadwal.*, waktu.*, kelas.*, ruang.*, status.*, matakuliah.*");
			$this->db->from("jadwal");
			$this->db->join("waktu", "jadwal.id_waktu = waktu.id_waktu");
			$this->db->join("kelas", "jadwal.id_kelas = kelas.id_kelas");
			$this->db->join("ruang", "jadwal.id_ruang = ruang.id_ruang");
			$this->db->join("status", "jadwal.id_status = status.id_status");
			$this->db->join("matakuliah", "jadwal.id_matakuliah = matakuliah.id_matakuliah");
			$this->db->where('ruang.id_lantai', 11);
			$this->db->where('jadwal.id_jadwal', $id_jadwal);
			$id_jadwal = $this->db->get('')->result();
		}
		$this->response($id_jadwal, 200);
	}

	public function gedungClantai3_get()
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
			$this->db->where('ruang.id_lantai', 12);
			$id_jadwal = $this->db->get('')->result();
		} else {
			$this->db->select("jadwal.*, waktu.*, kelas.*, ruang.*, status.*, matakuliah.*");
			$this->db->from("jadwal");
			$this->db->join("waktu", "jadwal.id_waktu = waktu.id_waktu");
			$this->db->join("kelas", "jadwal.id_kelas = kelas.id_kelas");
			$this->db->join("ruang", "jadwal.id_ruang = ruang.id_ruang");
			$this->db->join("status", "jadwal.id_status = status.id_status");
			$this->db->join("matakuliah", "jadwal.id_matakuliah = matakuliah.id_matakuliah");
			$this->db->where('ruang.id_lantai', 12);
			$this->db->where('jadwal.id_jadwal', $id_jadwal);
			$id_jadwal = $this->db->get('')->result();
		}
		$this->response($id_jadwal, 200);
	}

	public function gedungClantai4_get()
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
			$this->db->where('ruang.id_lantai', 13);
			$id_jadwal = $this->db->get('')->result();
		} else {
			$this->db->select("jadwal.*, waktu.*, kelas.*, ruang.*, status.*, matakuliah.*");
			$this->db->from("jadwal");
			$this->db->join("waktu", "jadwal.id_waktu = waktu.id_waktu");
			$this->db->join("kelas", "jadwal.id_kelas = kelas.id_kelas");
			$this->db->join("ruang", "jadwal.id_ruang = ruang.id_ruang");
			$this->db->join("status", "jadwal.id_status = status.id_status");
			$this->db->join("matakuliah", "jadwal.id_matakuliah = matakuliah.id_matakuliah");
			$this->db->where('ruang.id_lantai', 13);
			$this->db->where('jadwal.id_jadwal', $id_jadwal);
			$id_jadwal = $this->db->get('')->result();
		}
		$this->response($id_jadwal, 200);
	}

}

/* End of file statusRuangan.php */
/* Location: ./application/controllers/statusRuangan.php */