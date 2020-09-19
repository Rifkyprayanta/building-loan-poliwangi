<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dasboard extends CI_Controller {

	var $API ="";

	function __construct(){
		parent::__construct();
		$this->load->helper(array('form', 'url'));
		$this->API="http://localhost/peminjamangedung/server/";
	
		if($this->session->userdata('status') != "login" || $this->session->userdata('akses')!='0'){
			redirect(base_url("login"));
		}
	}

	//function untuk menampilkan view halaman admin, dan memanggil template. 

	public function index()
	{
		$data['judul'] = 'Informasi Gedung';
		$data['informasi'] = json_decode($this->curl->simple_get($this->API.'/informasi'));
		$data['content'] = $this->load->view('informasi/informasi_gedung', $data, TRUE); 
		$this->load->view('template/main', $data);
	}

}

/* End of file dasboard.php */
/* Location: ./application/controllers/dasboard.php */