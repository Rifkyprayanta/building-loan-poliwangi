<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	// function construct ini diisi dengan session dimana session ini didapat dari controller login.php function cekLogin

	var $API ="";

	function __construct(){
		parent::__construct();
		$this->load->helper('form');
		$this->load->model('Model_login');
		$this->load->model('Model_user');
		$this->load->helper(array('form', 'url'));
		$this->API="http://localhost/peminjamangedung/server/dasboard";
	
		if($this->session->userdata('status') != "login" || $this->session->userdata('akses')!='0'){
			redirect(base_url("login"));
		}
	}

	//function untuk menampilkan view halaman admin, dan memanggil template. 

	public function index()
	{
		$data['judul'] = 'Halaman Admin';
		$data['header'] = $this->load->view('view_header');
		$data['dasboard'] = json_decode($this->curl->simple_get($this->API.'/ruangan'));
		$data['persen'] = json_decode($this->curl->simple_get($this->API.'/persentase'));
		$data['user'] = json_decode($this->curl->simple_get($this->API.'/user'));
		$data['content'] = $this->load->view('view_admin', $data, TRUE); 
		$this->load->view('template/main', $data);
	}
}

/* End of file admin.php */
/* Location: ./application/controllers/admin.php */