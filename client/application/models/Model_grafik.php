<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_grafik extends CI_Model {

	//model grafik ini digunakan untuk menampilkan grafik ke dalam website. Model ini dipanggil dari controller grafik. dan berisikan function get_data() yang didalamnya berisi query untuk menampilkan data jadwal berdasarkan id status.
	function get_data(){
      $this->db->select('status.status, COUNT(jadwal.id_status) AS jumlah');
      $this->db->from('jadwal');
      $this->db->join('status', 'jadwal.id_status = status.id_status');
      $this->db->group_by('jadwal.id_status');
      $result = $this->db->get('');
      return $result;
  }

}

/* End of file Model_grafik.php */
/* Location: ./application/models/Model_grafik.php */