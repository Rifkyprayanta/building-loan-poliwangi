<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_laporan extends CI_Model {

	//model laporan ini digunakan untuk menampilkan laporan ke dalam website berdasarkan tanggal yang ditentukan. Model ini dipanggil dari controller laporan. dan berisikan function get_laporan() yang didalamnya berisi query untuk menampilkan data data peminjaman ruangan berdasarkan keyword atau tanggal yang ditentutkan.
	public function get_laporan($keyword, $keyword1)
	{
		$this->db->select("pinjam.*, ruang.*, COUNT(pinjam.id_ruang) as jumlah, date_format(pinjam.tgl_pinjam, '%d/%m/%y') as tanggalan");
		$this->db->from("pinjam");
		$this->db->join("ruang", "pinjam.id_ruang = ruang.id_ruang");
		$this->db->where("pinjam.tgl_pinjam >=", $keyword);
		$this->db->where("pinjam.tgl_pinjam <=", $keyword1);
		$this->db->group_by("pinjam.id_ruang");
		return $this->db->get('')->result();
	}
	

}

/* End of file model_laporan.php */
/* Location: ./application/models/model_laporan.php */