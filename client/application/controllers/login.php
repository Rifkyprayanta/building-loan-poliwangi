<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class login extends CI_Controller {

	// function construct ini diisi dengan model, helper dan library. model digunakan untuk memanggil data database , helper untuk mengaktifkan url , dan librari untuk validasi form
	public function __construct()
	{
		parent::__construct();

		$this->load->model('Model_login');
		$this->load->helper('url', 'form');
		$this->load->library('form_validation');
		$this->load->library('session');
	}

	// function ini digunakan untuk memanggil halaman view_login. 

	public function index()
	{
		$this->load->view('view_login');
	}

	//function ini digunakan untuk melakukan pengecekan login sistem.
	public function cekLogin()
	{

		$username = $this->input->post('username');
		$password = $this->input->post('password');

		$cek = $this->Model_login->cek_login("tb_user", array('username' => $username), array('password' => $password));
		//$data=$cek->row_array();
		if($cek > 0)
		{
			foreach ($cek as $id) 
			{
				if($id->level=='0')
				{
					$data_session = array('nama' => $id->nama, 'foto'=>$id->foto, 'status' => "login");
					$this->session->set_userdata('akses','0');
					$this->session->set_userdata($data_session);
					redirect(base_url("admin"));
				}
				elseif ($id->level=='1') {
					$data_session = array('nama' => $id->nama, 'foto'=>$id->foto, 'status' => "login");
					$this->session->set_userdata('akses','1');
					$this->session->set_userdata($data_session);
					redirect(base_url("pimpinan"));
				}
				elseif ($id->level=='2') {
					$data_session = array('nama' => $id->nama, 'foto'=>$id->foto, 'status' => "login");
					$this->session->set_userdata('akses','2');
					$this->session->set_userdata($data_session);
					redirect(base_url("peminjam"));
				}
				else
				{
					$this->session->set_flashdata('message', '<div class="alert alert-danger">
                    <p>Anda Tidak Terdaftar</p>
                </div>');
				}
			}
		}
		else
		{
			$this->session->set_flashdata('message', '<div class="alert alert-danger">
                    <p>Anda Salah Username atau Password, Silahkan Coba Kembali</p>
                </div>');
			redirect(base_url("login"));

		}
	}

	//function ini untuk melakukan logout dan menghapus session.

	public function logout()
	{
		$this->session->sess_destroy();
		redirect(base_url('login'));
	}

}

/* End of file login.php */
/* Location: ./application/controllers/login.php */