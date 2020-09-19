<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Peminjaman extends CI_Controller {

	var $API ="";

	function __construct(){
		parent::__construct();
		$this->load->helper(array('form', 'url'));
		$this->load->model('model_peminjaman');
		$this->API="http://localhost/peminjamangedung/server/";
	
		if($this->session->userdata('status') != "login" || $this->session->userdata('akses')!='0'){
			redirect(base_url("login"));
		}
	}

	//function untuk menampilkan view halaman admin, dan memanggil template. 


	public function index()
	{
		$data['judul'] = "Data Informasi Peminjam";
		$data['peminjaman'] = json_decode($this->curl->simple_get($this->API.'/peminjaman'));
		$data['content'] = $this->load->view('peminjaman/lihat_peminjaman', $data, TRUE); 
		$this->load->view('template/main', $data);
	}

	public function tambah_peminjaman()
	{
		if(isset($_POST['submit'])){

			$data = array(
				'id_peminjaman'=>  $this->input->post('id_peminjaman'),
                'tgl_pinjam'   =>  $this->input->post('tgl_pinjam'),
            	'id_ruang'   =>  $this->input->post('id_ruang'),
            	'id_user'      =>  $this->input->post('id_user'),
           	 	'jam_mulai'    =>  $this->input->post('jam_mulai'),
           	 	'jam_selesai'  =>  $this->input->post('jam_selesai'),
           	 	'status'       =>  $this->input->post('status'),
           		'timestamp'    =>  CURRENTTIMESTAMP);

			$this->load->library('ciqrcode');

        	$config['cacheable']    = true; //boolean, the default is true
     		$config['cachedir']     = '/assets/'; //string, the default is application/cache/
        	$config['errorlog']     = '/assets/'; //string, the default is application/logs/
        	$config['imagedir']     = '/assets/images/'; //direktori penyimpanan qr code
        	$config['quality']      = true; //boolean, the default is true
        	$config['size']         = '1024'; //interger, the default is 1024
        	$config['black']        = array(224,255,255); // array, default is array(255,255,255)
        	$config['white']        = array(70,130,180); // array, default is array(0,0,0)
        	$this->ciqrcode->initialize($config);

        	$id_peminjaman = $this->input->post('id_peminjaman');
        	$image_name=$id_peminjaman.'.png';

        	$params['data'] = $id_peminjaman; //data yang akan di jadikan QR CODE
       		$params['level'] = 'H'; //H=High
        	$params['size'] = 10;
        	$params['savename'] = FCPATH.$config['imagedir'].$image_name; //simpan image QR CODE ke folder assets/images/
        	$this->ciqrcode->generate($params);
        		
            $insert =  $this->curl->simple_post($this->API.'/peminjaman', $data, array(CURLOPT_BUFFERSIZE => 10)); 
            if($insert)
            {
                $this->session->set_flashdata('hasil','Insert Data Berhasil');
            }else
            {
               $this->session->set_flashdata('hasil','Insert Data Gagal');
            }
            redirect('peminjaman/');
        }else{
        	$data['judul'] = 'Tambah Data Peminjaman';
			$data['ruangan'] = json_decode($this->curl->simple_get($this->API.'/ruangan'));
			$data['user'] = json_decode($this->curl->simple_get($this->API.'/user'));
            $data['lastid'] = json_decode($this->curl->simple_get($this->API.'/peminjaman/lastid'));
			$data['content'] = $this->load->view('peminjaman/tambah_peminjaman', $data, TRUE); 
			$this->load->view('template/main', $data);
        }
	}

	public function simpan()
	{
        $id_peminjaman = $this->input->post('id_peminjaman');
		$id_ruang	=	$this->input->post('id_ruang');
        $id_user	=	$this->input->post('id_user');
        $jam_mulai		=	$this->input->post('jam_mulai');
        $jam_selesai	=	$this->input->post('jam_selesai');
        $tgl_pinjam	=	$this->input->post('tgl_pinjam');
        $status		=	$this->input->post('status');

        $this->model_peminjaman->simpan_peminjaman($id_peminjaman, $id_ruang,$id_user,$jam_mulai,$jam_selesai, $tgl_pinjam, $status); //simpan ke database
        redirect('peminjaman/');
	}

	public function edit_peminjaman($id_peminjaman)
	{
		if(isset($_POST['submit'])){
            $data = array(
            	'id_matakuliah'		=>	$id_matakuliah,
                'id_kelas'      =>  $this->input->post('id_kelas'),
            	'id_ruang'     		 =>  $this->input->post('id_ruang'),
            	'id_waktu'      =>  $this->input->post('id_waktu'),
           	 	'tahun_ajaran'      =>  $this->input->post('tahun_ajaran'),
           	 	'semester'      =>  $this->input->post('semester'));
            $update =  $this->curl->simple_put($this->API.'/matkul', $data, array(CURLOPT_BUFFERSIZE => 10)); 
            if($update)
            {
                $this->session->set_flashdata('hasil','Update Data Berhasil');
            }else
            {
               $this->session->set_flashdata('hasil','Update Data Gagal');
            }
            redirect('mata_kuliah/');
        }else{

            $data['id_peminjaman'] = $id_peminjaman;
            
            $this->load->library('ciqrcode'); //pemanggilan library QR CODE
 
            $config['cacheable']    = true; //boolean, the default is true
            $config['cachedir']     = './assets/'; //string, the default is application/cache/
            $config['errorlog']     = './assets/'; //string, the default is application/logs/
            $config['imagedir']     = './assets/images/'; //direktori penyimpanan qr code
            $config['quality']      = true; //boolean, the default is true
            $config['size']         = '1024'; //interger, the default is 1024
            $config['black']        = array(224,255,255); // array, default is array(255,255,255)
            $config['white']        = array(70,130,180); // array, default is array(0,0,0)
            $this->ciqrcode->initialize($config);
 
            $image_name=$id_peminjaman.'.png'; //buat name dari qr code sesuai dengan nim
 
            $params['data'] = $id_peminjaman; //data yang akan di jadikan QR CODE
            $params['level'] = 'H'; //H=High
            $params['size'] = 10;
            $params['savename'] = FCPATH.$config['imagedir'].$image_name; //simpan image QR CODE ke folder assets/images/
            $this->ciqrcode->generate($params); // fungsi untuk generate QR CODE
 
            $this->model_peminjaman->simpan_qr($id_peminjaman, $image_name);
            
			$data['judul'] = 'Scan QR Code';
			$data['peminjaman'] = json_decode($this->curl->simple_get($this->API.'/peminjaman',array('id_peminjaman'=>$this->uri->segment(3))));            
			$data['content'] = $this->load->view('peminjaman/lihat_qrcode',$data, TRUE);
			$this->load->view('template/main',$data);
        }
	}


    public function hapus_peminjaman($id_peminjaman){
        if(empty($id_peminjaman)){
            redirect('peminjaman/');
        }else{
            $delete = $this->curl->simple_delete($this->API.'/peminjaman', array('id_peminjaman'=>$id_peminjaman), array(CURLOPT_BUFFERSIZE => 10));
                if($delete) {
                    $this->session->set_flashdata('hasil','Delete Data Berhasil');
                }else{
                    $this->session->set_flashdata('hasil','Delete Data Gagal');
                }
                redirect('peminjaman/');
            }
    }

}

/* End of file peminjam.php */
/* Location: ./application/controllers/peminjam.php */