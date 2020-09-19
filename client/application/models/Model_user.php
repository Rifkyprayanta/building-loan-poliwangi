<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_user extends CI_Model {

	//model user ini digunakan untuk menampilkan data user ke dalam website. Model ini dipanggil dari controller user. dan berisikan function insert() yang didalamnya berisi query untuk melakukan insert data kedalam database.
	public function insert($data)
	{
		$this->db->insert('user',$data);
	}

	//function update untuk melakukan update data user
	public function update($data, $where)
	{
		$this->db->update('user', $data, $where);
	}

	

}

/* End of file Model_user.php */
/* Location: ./application/models/Model_user.php */