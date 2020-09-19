<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Informasi_gedung extends CI_Controller {

	var $API ="";

	function __construct(){
		parent::__construct();
		$this->load->helper(array('form', 'url'));
		$this->load->model('model_informasi');
		$this->API="http://localhost/peminjamangedung/server/";
	
		if($this->session->userdata('status') != "login" || $this->session->userdata('akses')!='0' && $this->session->userdata('akses')!='1' && $this->session->userdata('akses')!='2'){
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

	public function tambah_informasi()
	{
		if(isset($_POST['submit'])){
            $config['upload_path']         = 'assets/berita/';  // folder upload 
            $config['allowed_types']        = 'gif|jpg|png'; // jenis file
            $config['max_size']             = 3000;
            $config['max_width']            = 1000;
            $config['max_height']           = 1000;
 
            $this->load->library('upload', $config);
 
            if ( ! $this->upload->do_upload('foto')) //sesuai dengan name pada form 
            {
                   echo 'anda gagal upload';
            }
            else
            {
            	//tampung data dari form
            	$judul_acara = $this->input->post('judul_acara');
            	$tanggal = $this->input->post('tanggal');
            	$file = $this->upload->data();
            	$foto = $file['file_name'];
 
                $this->model_informasi->insert(array(
			        'judul_acara' => $judul_acara,
			        'tanggal' => $tanggal,
			        'foto' => $foto
				));
				$this->session->set_flashdata('msg','data berhasil di upload');
				redirect('informasi_gedung/');
            }
        }else{
        	$data['judul'] = 'Tambah Informasi Gedung';
			$data['content'] = $this->load->view('informasi/tambah_informasi', $data, TRUE); 
			$this->load->view('template/main', $data);
        }
	}

	public function edit_informasi($id_berita)
	{
		if(isset($_POST['submit'])){

            $config['upload_path']         = 'assets/berita/';  // foler upload 
            $config['allowed_types']        = 'gif|jpg|png'; // jenis file
            $config['max_size']             = 3000;
            $config['max_width']            = 1024;
            $config['max_height']           = 768;

            $this->load->library('upload', $config);

            if ( ! $this->upload->do_upload('gambar')) //sesuai dengan name pada form 
            {
                   echo 'anda belum upload';
            }
            else
            {
                //tampung data dari form
                $judul_acara = $this->input->post('judul_acara');
                $tanggal = $this->input->post('tanggal');
                $file = $this->upload->data();
                $gambar = $file['file_name'];

                $this->model_informasi->update(array(
                    'judul_acara' => $judul_acara,
                    'tanggal' => $tanggal,
                    'foto' => $gambar
                    ), array('id_berita' => $this->input->post('id_berita')
                        )
                );
                $this->session->set_flashdata('msg','data berhasil di update');
                redirect('informasi_gedung/');
            }
        }else{
            $data['id_berita'] = $id_berita;
			$data['judul'] = 'Edit Informasi Gedung';
			$data['informasi'] = json_decode($this->curl->simple_get($this->API.'/informasi',array('id_berita'=>$this->uri->segment(3))));
			$data['content'] = $this->load->view('informasi/edit_informasi',$data, TRUE);
			$this->load->view('template/main',$data);
        }
	}

	public function hapus_informasi($id_berita){
		if(empty($id_berita)){
			redirect('informasi_gedung/');
		}else{
			$delete = $this->curl->simple_delete($this->API.'/informasi', array('id_berita'=>$id_berita), array(CURLOPT_BUFFERSIZE => 10));
				if($delete) {
					$this->session->set_flashdata('hasil','Delete Data Berhasil');
				}else{
					$this->session->set_flashdata('hasil','Delete Data Gagal');
				}
				redirect('informasi_gedung/');
			}
	}
}

/* End of file informasi_gedung.php */
/* Location: ./application/controllers/informasi_gedung.php */