<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	var $API ="";

	function __construct(){
		parent::__construct();
		$this->load->helper(array('form', 'url'));
		$this->load->model('Model_user');
		$this->load->library('encryption');
		$this->API="http://localhost/peminjamangedung/server/";
	
		if($this->session->userdata('status') != "login" || $this->session->userdata('akses')!='0'){
			redirect(base_url("login"));
		}
	}

	public function index()
	{
		$data['judul'] = 'Kelola User';
		$data['user'] = json_decode($this->curl->simple_get($this->API.'/user'));
		$data['content'] = $this->load->view('user/lihat_user', $data, TRUE); 
		$this->load->view('template/main', $data);
	}

	public function tambah_user()
	{
		if(isset($_POST['submit'])){
            $config['upload_path']         = 'assets/user/';  // folder upload 
            $config['allowed_types']        = 'gif|jpg|png'; // jenis file
            $config['max_size']             = 3000;
            $config['max_width']            = 1000;
            $config['max_height']           = 1000;
 
            $this->load->library('upload', $config);
 
            if ( ! $this->upload->do_upload('foto')) //sesuai dengan name pada form 
            {
                echo "belum upload";
            }
            else
            {
            	//tampung data dari form
            	$nama = $this->input->post('nama');
            	$username = $this->input->post('username');
            	$password = $this->input->post('password');
            	$file = $this->upload->data();
            	$foto = $file['file_name'];
            	$level = $this->input->post('level');
                $id_kelas = $this->input->post('id_kelas');
 
                $this->Model_user->insert(array(
			        'nama' => $nama,
			        'username' => $username,
			        'password' => $password,
			        'foto' => $foto,
			        'level' => $level,
                    'id_kelas' => $id_kelas
				));
				$this->session->set_flashdata('msg','data berhasil di upload');
				redirect('user/');
            }
        }else{
        	$data['judul'] = 'Tambah User Pengguna';
            $data['kelas'] = json_decode($this->curl->simple_get($this->API.'/kelas'));
			$data['content'] = $this->load->view('user/tambah_user', $data, TRUE); 
			$this->load->view('template/main', $data);
        }
	}

	public function edit_user($id_user)
	{
		if(isset($_POST['submit'])){

            $config['upload_path']         = 'assets/user/';  // foler upload 
            $config['allowed_types']        = 'gif|jpg|png'; // jenis file
            $config['max_size']             = 3000;
            $config['max_width']            = 1000;
            $config['max_height']           = 1000;

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('foto')) //sesuai dengan name pada form 
            {
                   echo 'anda belum upload';
            }
            else
            {
                $nama = $this->input->post('nama');
                $username = $this->input->post('username');
                $password = $this->input->post('password');
                $level = $this->input->post('level');
                $id_kelas = $this->input->post('id_kelas');
                $file = $this->upload->data();
                $foto = $file['file_name'];

                $this->Model_user->update(array(
                    'nama' => $nama,
                    'username' => $username,
                    'password' => $password,
                    'level' => $level,
                    'id_kelas' => $id_kelas,
                    'foto' => $foto
                    ), 
                array('id_user' => $this->input->post('id_user')
                        )
                );
                $this->session->set_flashdata('msg','data berhasil di update');
                redirect('user/');
            }
        }else{
            $data['id_user'] = $id_user;
			$data['judul'] = 'Edit User';
            $data['kelas'] = json_decode($this->curl->simple_get($this->API.'/kelas'));
			$data['level'] = json_decode($this->curl->simple_get($this->API.'/user'));
			$data['user'] = json_decode($this->curl->simple_get($this->API.'/user',array('id_user'=>$this->uri->segment(3))));
			$data['content'] = $this->load->view('user/edit_user',$data, TRUE);
			$this->load->view('template/main',$data);
        }
	}

	public function delete_user($id_user){
		if(empty($id_user)){
			redirect('user/');
		}else{
			$delete = $this->curl->simple_delete($this->API.'/user', array('id_user'=>$id_user), array(CURLOPT_BUFFERSIZE => 10));
				if($delete) {
					$this->session->set_flashdata('hasil','Delete Data Berhasil');
				}else{
					$this->session->set_flashdata('hasil','Delete Data Gagal');
				}
				redirect('user/');
			}
	}

}

/* End of file user.php */
/* Location: ./application/controllers/user.php */