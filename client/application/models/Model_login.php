<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_login extends CI_Model {

    //model login ini digunakan untuk memproses login dari sistem admin, pimpinan maupun peminjam. Model ini dipanggil dari controller login. dan berisikan function cek_login() yang didalamnya berisi query untuk mencocokan data user dengan data yang diinputkan saat login.
	public function cek_login($table,$field1, $field2){	
	 	$this->db->select('user.*');
        $this->db->from('user');
        $this->db->where($field1);
        $this->db->where($field2);
        //$this->db->limit(1);
        $query = $this->db->get();
        if ($query->num_rows() == 0) {
            return FALSE;
        } else {
            return $query->result();
        }
		//return $this->db->get_where($table,$where);
	}

}

/* End of file Model_login.php */
/* Location: ./application/models/Model_login.php */