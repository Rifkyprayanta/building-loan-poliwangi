<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_informasi extends CI_Model {

	//model informasi ini digunakan untuk mengelola menu informasi gedung. Model ini dipanggil oleh controller informasi gedung dimana terdapat function insert yang digunakan untuk insert data kedalam database. 
  public function insert($data){
	$this->db->insert('berita',$data);
	}

	//function update digunakan untuk mengupdate data kedalam database
	public function update($data, $where)
	{
		$this->db->update('berita', $data, $where);
	}	
	

}

/* End of file model_informasi.php */
/* Location: ./application/models/model_informasi.php */