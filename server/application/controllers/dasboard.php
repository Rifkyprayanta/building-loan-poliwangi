<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';
class Dasboard extends REST_Controller {

	function __construct($config = 'rest') {
		parent::__construct($config);
		$this->load->library('encryption');
	}

	public function ruangan_get()
	{
		$id_peminjaman = $this->get('id_peminjaman');
		if ($id_peminjaman == '') {
			$this->db->select("COUNT(pinjam.status) as dipinjam");
			$this->db->from("pinjam");
			$this->db->where("pinjam.status", 'dipinjam');
			$id_peminjaman = $this->db->get('')->result();
		} else {
			$this->db->where('id_peminjaman', $id_peminjaman);
			$id_peminjaman = $this->db->get('jadwal')->result();
		}
		$this->response($id_peminjaman, 200);
	}


	public function persentase_get()
	{
		$id_peminjaman = $this->get('id_peminjaman');
		if ($id_peminjaman == '') {
			$this->db->select("pinjam.id_peminjaman, COUNT(pinjam.id_peminjaman) as jumlah, ROUND((COUNT(pinjam.id_peminjaman)/100)*100,0) as persen");
			$this->db->from("pinjam");
			$id_peminjaman = $this->db->get('')->result();
		} else {
			$this->db->where('id_peminjaman', $id_peminjaman);
			$id_peminjaman = $this->db->get('pinjam')->result();
		}
		$this->response($id_peminjaman, 200);
	}

	public function user_get()
	{
		$id_user = $this->get('id_user');
		if ($id_user == '') {
			$this->db->select("COUNT(user.id_user) as register");
			$this->db->from("user");
			$id_user = $this->db->get('')->result();
		} else {
			$this->db->where('id_user', $id_user);
			$id_user = $this->db->get('user')->result();
		}
		$this->response($id_user, 200);
	}

}

/* End of file dasboard.php */
/* Location: ./application/controllers/dasboard.php */