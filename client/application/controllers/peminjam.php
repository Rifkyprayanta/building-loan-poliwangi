<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Peminjam extends CI_Controller {

	// function construct ini diisi dengan session dimana session ini didapat dari controller login.php function cekLogin

	var $API ="";

	function __construct(){
		parent::__construct();
		$this->load->helper('form');
		$this->load->helper(array('form', 'url'));
		$this->API="http://localhost/peminjamangedung/server/";
	
		if($this->session->userdata('status') != "login" || $this->session->userdata('akses')!='2'){
			redirect(base_url("login"));
		}
	}

	public function index()
	{
		$data['judul'] = 'Halaman Peminjam';
		$data['content'] = $this->load->view('view_peminjam', $data, TRUE); 
		$this->load->view('template/main', $data);
	}

}

/* End of file admin.php */
/* Location: ./application/controllers/admin.php */