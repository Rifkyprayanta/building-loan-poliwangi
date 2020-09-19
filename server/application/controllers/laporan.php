<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';
class Laporan extends REST_Controller {

	function __construct($config = 'rest') {
		parent::__construct($config);
		$this->load->library('encryption');
	}

	public function index_get()
	{
		$id_peminjaman = $this->get('id_peminjaman');
		if ($id_peminjaman == '') {
			$this->db->select("pinjam.*, ruang.*, COUNT(pinjam.id_ruang) as jumlah, date_format(pinjam.tgl_pinjam, '%d/%m/%y') as tanggalan");
			$this->db->from("pinjam");
			$this->db->join("ruang", "pinjam.id_ruang = ruang.id_ruang");
			$this->db->group_by("pinjam.id_ruang");
			$id_peminjaman = $this->db->get('')->result();
		} else {
			$this->db->where('id_peminjaman', $id_peminjaman);
			$id_peminjaman = $this->db->get('pinjam')->result();
		}
		$this->response($id_peminjaman, 200);
	}

}

/* End of file laporan.php */
/* Location: ./application/controllers/laporan.php */