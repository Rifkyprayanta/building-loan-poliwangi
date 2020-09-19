<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Grafik extends CI_Controller {

	var $API ="";

	function __construct(){
		parent::__construct();
		$this->load->model('Model_grafik');
		//$this->load->helper(array('form', 'url'));
		//$this->API="http://localhost/peminjamangedung/server/";
	
		if($this->session->userdata('status') != "login" || $this->session->userdata('akses')!='0'){
			redirect(base_url("login"));
		}
	}

	public function index()
	{
		$data = $this->Model_grafik->get_data()->result();
      	$data['data'] = json_encode($data);
      	$data['judul'] = 'Grafik Peminjaman Ruangan';
		$data['content'] = $this->load->view('grafik/grafik_penggunaan', $data, TRUE); 
		$this->load->view('template/main', $data);
	}

}

/* End of file grafik.php */
/* Location: ./application/controllers/grafik.php */