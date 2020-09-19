<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';
class Status extends REST_Controller {

	function __construct($config = 'rest') {
		parent::__construct($config);
		$this->load->library('encryption');
	}

	public function index_get()
	{
		$id_status = $this->get('id_status');
		if ($id_status == '') {
			$id_status = $this->db->get('status')->result();
		} else {
			$this->db->where('id_status', $id_status);
			$id_status = $this->db->get('status')->result();
		}
		$this->response($id_status, 200);
	}

}

/* End of file status.php */
/* Location: ./application/controllers/status.php */