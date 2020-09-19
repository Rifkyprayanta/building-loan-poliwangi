<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';
class Grafik extends REST_Controller {

	function __construct($config = 'rest') {
		parent::__construct($config);
		$this->load->library('encryption');
	}

	public function index_get()
	{
		$id = $this->get('id');
		if ($id == '') {
			$id = $this->db->get('tb_contoh')->result();
		} else {
			$this->db->where('id', $id);
			$id = $this->db->get('tb_contoh')->result();
		}
		$this->response($id, 200);
	}

}

/* End of file grafik.php */
/* Location: ./application/controllers/grafik.php */