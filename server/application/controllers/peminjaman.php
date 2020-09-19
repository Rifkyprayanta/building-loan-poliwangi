<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';
class Peminjaman extends REST_Controller {

	function __construct($config = 'rest') {
		parent::__construct($config);
		$this->load->library('encryption');
	}

	public function index_get()
	{
		$id_peminjaman = $this->get('id_peminjaman');
		if ($id_peminjaman == '') {
			$this->db->select("pinjam.*, ruang.*, user.*, date_format(pinjam.jam_mulai, '%H:%i') as mulai, date_format(pinjam.jam_selesai, '%H:%i') as selesai, date_format(pinjam.tgl_pinjam, '%d %M %Y') as tanggal");
			$this->db->from("pinjam");
			$this->db->join("ruang", "pinjam.id_ruang = ruang.id_ruang");
			$this->db->join("user", "pinjam.id_user = user.id_user");
			$this->db->order_by("pinjam.id_peminjaman", "DESC");
			$id_peminjaman = $this->db->get('')->result();
		} else {
			$this->db->where('id_peminjaman', $id_peminjaman);
			$id_peminjaman = $this->db->get('pinjam')->result();
		}
		$this->response($id_peminjaman, 200);
	}

	public function lastid_get()
	{
		$id_peminjaman = $this->get('id_peminjaman');
		if ($id_peminjaman == '') {
			$this->db->select("MAX(id_peminjaman)+1 as id");
			$id_peminjaman = $this->db->get('pinjam')->result();
		} else {
			$this->db->where('id_peminjaman', $id_peminjaman);
			$id_peminjaman = $this->db->get('pinjam')->result();
		}
		$this->response($id_peminjaman, 200);
	}

	function index_post($image_name) {
		$data = array(
			'id_peminjaman'=>  $this->input->post('peminjaman'),
			'tgl_pinjam'      =>  $this->input->post('tgl_pinjam'),
            'id_ruang'     		 =>  $this->input->post('id_ruang'),
            'id_user'      =>  $this->input->post('id_user'),
           	'jam_mulai'      =>  $this->input->post('jam_mulai'),
           	'jam_selesai'      =>  $this->input->post('jam_selesai'),
           	'status'      =>  $this->input->post('status'),
           	'timestamp'      =>  CURRENT_TIMESTAMP,
           	'qr_code' 	   =>  $image_name);	
		$insert = $this->db->insert('pinjam', $data);
		if ($insert) {
			$this->response($data, 200);
		} else {
			$this->response(array('status' => 'fail', 502));
		}
	}

	function index_delete() {	
		$id_peminjaman = $this->delete('id_peminjaman');
		$this->db->where('id_peminjaman', $id_peminjaman);
		$delete = $this->db->delete('pinjam');
		if ($delete) {
			$this->response(array('status' => 'success'), 201);
		} else {
			$this->response(array('status' => 'fail', 502));
		}
	}

}

/* End of file peminjaman.php */
/* Location: ./application/controllers/peminjaman.php */