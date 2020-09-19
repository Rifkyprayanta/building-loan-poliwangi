<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH.'third_party/Spout/Autoloader/autoload.php';

use Box\Spout\Reader\ReaderFactory;
use Box\Spout\Common\Type;

class Ruangan extends CI_Controller {
	private $filename = "import_data";
	var $API ="";

	function __construct(){
		parent::__construct();
		$this->load->helper(array('form', 'url'));
		$this->load->library('encryption');
		$this->load->model('Model_jadwal');
		$this->API="http://localhost/peminjamangedung/server/";
	
		if($this->session->userdata('status') != "login" || $this->session->userdata('akses')!='0' && $this->session->userdata('akses')!='1'){
			redirect(base_url("login"));
		}
	}

	public function index()
	{
		$data['judul'] = 'Kelola Jadwal Ruangan';
		$data['jadwal'] = json_decode($this->curl->simple_get($this->API.'/jadwal'));
		$data['content'] = $this->load->view('ruangan/jadwal_ruangan', $data, TRUE); 
		$this->load->view('template/main', $data);
	}

	public function import()
    {
        //ketika button submit diklik
        if ($this->input->post('submit', TRUE) == 'upload')
        {
            $config['upload_path']      = './temp_doc/'; //siapkan path untuk upload file
            $config['allowed_types']    = 'xlsx|xls'; //siapkan format file
            $config['file_name']        = 'doc'.time(); //rename file yang diupload
       
            $this->load->library('upload', $config);
       
            if ($this->upload->do_upload('excel'))
            {
                //fetch data upload
                $file   = $this->upload->data();
       
                $reader = ReaderFactory::create(Type::XLSX); //set Type file xlsx
                $reader->open('temp_doc/'.$file['file_name']); //open file xlsx
 
                //looping pembacaat sheet dalam file        
                foreach ($reader->getSheetIterator() as $sheet)
                {
                    $numRow = 1;
 
                    //siapkan variabel array kosong untuk menampung variabel array data
                    $save   = array();
 
                    //looping pembacaan row dalam sheet
                    foreach ($sheet->getRowIterator() as $row)
                    {
                        if ($numRow > 1)
                        {
                            $data = array(
                                'id_waktu'              => $row['A'],
                                'id_kelas'     => $row['B'],
                                'id_ruang'            => $row['C'],
                                'id_status'            => $row['D'],
                                'id_matakuliah'            => $row['E']
                            );
 
                            //tambahkan array $data ke $save
                            array_push($save, $data);
                        }
                       
                        $numRow++;
                    }
                    //simpan data ke database
                    $this->Model_jadwal->simpan($save);
 
                    //tutup spout reader
                    $reader->close();
 
                    //hapus file yang sudah diupload
                    unlink('temp_doc/'.$file['file_name']);
 
                    //tampilkan pesan success dan redirect ulang ke index controller import
                    echo    '<script type="text/javascript">
                               alert(\'Data berhasil disimpan\');
                               window.location.replace("'.base_url().'");
                           </script>';
                }
            }
            else
            {
                echo "Error :".$this->upload->display_errors(); //tampilkan pesan error jika file gagal diupload
            }
        }
 
        redirect('ruangan/');
    }

	public function tambah_jadwal()
	{
		if(isset($_POST['submit'])){
            $data = array(
                'id_ruang'      =>  $this->input->post('id_ruang'),
            	'id_kelas'      =>  $this->input->post('id_kelas'),
        		'id_waktu'      =>  $this->input->post('id_waktu'),
        		'id_status'      =>  $this->input->post('id_status'),
        		'id_matakuliah'      =>  $this->input->post('id_matakuliah'));
            $insert =  $this->curl->simple_post($this->API.'/jadwal', $data, array(CURLOPT_BUFFERSIZE => 10)); 
            if($insert)
            {
                $this->session->set_flashdata('hasil','Insert Data Berhasil');
            }else
            {
               $this->session->set_flashdata('hasil','Insert Data Gagal');
            }
            redirect('ruangan/');
        }else{
        	$data['judul'] = 'Tambah Jadwal Ruangan';
			$data['kelas'] = json_decode($this->curl->simple_get($this->API.'/kelas'));
			$data['waktu'] = json_decode($this->curl->simple_get($this->API.'/waktu'));
			$data['ruangan'] = json_decode($this->curl->simple_get($this->API.'/ruangan'));
			$data['status'] = json_decode($this->curl->simple_get($this->API.'/status'));
			$data['matkul'] = json_decode($this->curl->simple_get($this->API.'/matkul'));
			$data['content'] = $this->load->view('ruangan/tambah_jadwal', $data, TRUE); 
			$this->load->view('template/main', $data);
        }
	}

	public function edit_jadwal($id_jadwal)
	{
		if(isset($_POST['submit'])){
            $data = array(
            	'id_jadwal'		=>	$id_jadwal,
                'id_ruang'      =>  $this->input->post('id_ruang'),
            	'id_kelas'     		 =>  $this->input->post('id_kelas'),
            	'id_waktu'      =>  $this->input->post('id_waktu'),
            	'id_status'      =>  $this->input->post('id_status'),
            	'id_matakuliah'      =>  $this->input->post('id_matakuliah'));
            $update =  $this->curl->simple_put($this->API.'/jadwal', $data, array(CURLOPT_BUFFERSIZE => 10)); 
            if($update)
            {
                $this->session->set_flashdata('hasil','Update Data Berhasil');
            }else
            {
               $this->session->set_flashdata('hasil','Update Data Gagal');
            }
            redirect('ruangan/');
        }else{
            $data['id_jadwal'] = $id_jadwal;
			$data['judul'] = 'Edit Jadwal Ruangan';
			$data['kelas'] = json_decode($this->curl->simple_get($this->API.'/kelas'));
			$data['waktu'] = json_decode($this->curl->simple_get($this->API.'/waktu'));
			$data['ruangan'] = json_decode($this->curl->simple_get($this->API.'/ruangan'));
			$data['status'] = json_decode($this->curl->simple_get($this->API.'/status'));
			$data['matkul'] = json_decode($this->curl->simple_get($this->API.'/matkul'));
			$data['jadwal']	= json_decode($this->curl->simple_get($this->API.'/jadwal',array('id_jadwal'=>$this->uri->segment(3))));
			$data['content'] = $this->load->view('ruangan/edit_jadwal',$data, TRUE);
			$this->load->view('template/main',$data);
        }
	}

	public function delete_jadwal($id_jadwal){
		if(empty($id_jadwal)){
			redirect('ruangan/');
		}else{
			$delete = $this->curl->simple_delete($this->API.'/jadwal', array('id_jadwal'=>$id_jadwal), array(CURLOPT_BUFFERSIZE => 10));
				if($delete) {
					$this->session->set_flashdata('hasil','Delete Data Berhasil');
				}else{
					$this->session->set_flashdata('hasil','Delete Data Gagal');
				}
				redirect('ruangan/');
			}
	}

	public function statusRuanganGAL1()
	{
		$data['judul'] = 'Status Ruangan Gedung A Lantai 1';
		$data['ruangan'] = json_decode($this->curl->simple_get($this->API.'/statusRuangan/gedungAlantai1'));
		$data['content'] = $this->load->view('ruangan/status_ruanganGAL1', $data, TRUE); 
		$this->load->view('template/main', $data);
	}

	public function ketstatusRuanganGAL1($id_jadwal)
	{
		$data['id_jadwal'] = $id_jadwal;
		$params	= array('id_jadwal'=>$this->uri->segment(3));
		$data['judul'] = 'Status Ruangan Gedung A Lantai 1';
		$data['ruangan'] = json_decode($this->curl->simple_get($this->API.'/statusRuangan/gedungAlantai1/',$params));
		$data['content'] = $this->load->view('ruangan/ketstatus_ruanganGAL1', $data, TRUE); 
		$this->load->view('template/main', $data);
	}

	public function statusRuanganGAL2()
	{
		$data['judul'] = 'Status Ruangan Gedung A Lantai 2';
		$data['ruangan'] = json_decode($this->curl->simple_get($this->API.'/statusRuangan/gedungAlantai2'));
		$data['content'] = $this->load->view('ruangan/status_ruanganGAL2', $data, TRUE); 
		$this->load->view('template/main', $data);
	}

	public function ketstatusRuanganGAL2($id_jadwal)
	{
		$data['id_jadwal'] = $id_jadwal;
		$params	= array('id_jadwal'=>$this->uri->segment(3));
		$data['judul'] = 'Status Ruangan Gedung A Lantai 2';
		$data['ruangan'] = json_decode($this->curl->simple_get($this->API.'/statusRuangan/gedungAlantai2/',$params));
		$data['content'] = $this->load->view('ruangan/ketstatus_ruanganGAL2', $data, TRUE); 
		$this->load->view('template/main', $data);
	}

	public function statusRuanganGAL3()
	{
		$data['judul'] = 'Status Ruangan Gedung A Lantai 3';
		$data['ruangan'] = json_decode($this->curl->simple_get($this->API.'/statusRuangan/gedungAlantai3'));
		$data['content'] = $this->load->view('ruangan/status_ruanganGAL3', $data, TRUE); 
		$this->load->view('template/main', $data);
	}

	public function ketstatusRuanganGAL3($id_jadwal)
	{
		$data['id_jadwal'] = $id_jadwal;
		$params	= array('id_jadwal'=>$this->uri->segment(3));
		$data['judul'] = 'Status Ruangan Gedung A Lantai 3';
		$data['ruangan'] = json_decode($this->curl->simple_get($this->API.'/statusRuangan/gedungAlantai3/',$params));
		$data['content'] = $this->load->view('ruangan/ketstatus_ruanganGAL3', $data, TRUE); 
		$this->load->view('template/main', $data);
	}

	public function statusRuanganGAL4()
	{
		$data['judul'] = 'Status Ruangan Gedung A Lantai 4';
		$data['ruangan'] = json_decode($this->curl->simple_get($this->API.'/statusRuangan/gedungAlantai4'));
		$data['content'] = $this->load->view('ruangan/status_ruanganGAL4', $data, TRUE); 
		$this->load->view('template/main', $data);
	}

	public function ketstatusRuanganGAL4($id_jadwal)
	{
		$data['id_jadwal'] = $id_jadwal;
		$params	= array('id_jadwal'=>$this->uri->segment(3));
		$data['judul'] = 'Status Ruangan Gedung A Lantai 4';
		$data['ruangan'] = json_decode($this->curl->simple_get($this->API.'/statusRuangan/gedungAlantai4/',$params));
		$data['content'] = $this->load->view('ruangan/ketstatus_ruanganGAL4', $data, TRUE); 
		$this->load->view('template/main', $data);
	}

	public function statusRuanganGBL1()
	{
		$data['judul'] = 'Status Ruangan Gedung B Lantai 1';
		$data['ruangan'] = json_decode($this->curl->simple_get($this->API.'/statusRuangan/gedungBlantai1'));
		$data['content'] = $this->load->view('ruangan/status_ruanganGBL1', $data, TRUE); 
		$this->load->view('template/main', $data);
	}

	public function ketstatusRuanganGBL1($id_jadwal)
	{
		$data['id_jadwal'] = $id_jadwal;
		$params	= array('id_jadwal'=>$this->uri->segment(3));
		$data['judul'] = 'Status Ruangan Gedung B Lantai 1';
		$data['ruangan'] = json_decode($this->curl->simple_get($this->API.'/statusRuangan/gedungBlantai1/',$params));
		$data['content'] = $this->load->view('ruangan/ketstatus_ruanganGBL1', $data, TRUE); 
		$this->load->view('template/main', $data);
	}

	public function statusRuanganGBL2()
	{
		$data['judul'] = 'Status Ruangan Gedung B Lantai 2';
		$data['ruangan'] = json_decode($this->curl->simple_get($this->API.'/statusRuangan/gedungBlantai2'));
		$data['content'] = $this->load->view('ruangan/status_ruanganGBL2', $data, TRUE); 
		$this->load->view('template/main', $data);
	}

	public function ketstatusRuanganGBL2($id_jadwal)
	{
		$data['id_jadwal'] = $id_jadwal;
		$params	= array('id_jadwal'=>$this->uri->segment(3));
		$data['judul'] = 'Status Ruangan Gedung B Lantai 2';
		$data['ruangan'] = json_decode($this->curl->simple_get($this->API.'/statusRuangan/gedungBlantai2/',$params));
		$data['content'] = $this->load->view('ruangan/ketstatus_ruanganGBL2', $data, TRUE); 
		$this->load->view('template/main', $data);
	}

	public function statusRuanganGBL3()
	{
		$data['judul'] = 'Status Ruangan Gedung B Lantai 3';
		$data['ruangan'] = json_decode($this->curl->simple_get($this->API.'/statusRuangan/gedungBlantai3'));
		$data['content'] = $this->load->view('ruangan/status_ruanganGBL3', $data, TRUE); 
		$this->load->view('template/main', $data);
	}

	public function ketstatusRuanganGBL3($id_jadwal)
	{
		$data['id_jadwal'] = $id_jadwal;
		$params	= array('id_jadwal'=>$this->uri->segment(3));
		$data['judul'] = 'Status Ruangan Gedung B Lantai 3';
		$data['ruangan'] = json_decode($this->curl->simple_get($this->API.'/statusRuangan/gedungBlantai3/',$params));
		$data['content'] = $this->load->view('ruangan/ketstatus_ruanganGBL3', $data, TRUE); 
		$this->load->view('template/main', $data);
	}

	public function statusRuanganGBL4()
	{
		$data['judul'] = 'Status Ruangan Gedung B Lantai 4';
		$data['ruangan'] = json_decode($this->curl->simple_get($this->API.'/statusRuangan/gedungBlantai4'));
		$data['content'] = $this->load->view('ruangan/status_ruanganGBL4', $data, TRUE); 
		$this->load->view('template/main', $data);
	}

	public function ketstatusRuanganGBL4($id_jadwal)
	{
		$data['id_jadwal'] = $id_jadwal;
		$params	= array('id_jadwal'=>$this->uri->segment(3));
		$data['judul'] = 'Status Ruangan Gedung B Lantai 4';
		$data['ruangan'] = json_decode($this->curl->simple_get($this->API.'/statusRuangan/gedungBlantai4/',$params));
		$data['content'] = $this->load->view('ruangan/ketstatus_ruanganGBL4', $data, TRUE); 
		$this->load->view('template/main', $data);
	}

	public function statusRuanganGBL5()
	{
		$data['judul'] = 'Status Ruangan Gedung B Lantai 5';
		$data['ruangan'] = json_decode($this->curl->simple_get($this->API.'/statusRuangan/gedungBlantai5'));
		$data['content'] = $this->load->view('ruangan/status_ruanganGBL5', $data, TRUE); 
		$this->load->view('template/main', $data);
	}

	public function ketstatusRuanganGBL5($id_jadwal)
	{
		$data['id_jadwal'] = $id_jadwal;
		$params	= array('id_jadwal'=>$this->uri->segment(3));
		$data['judul'] = 'Status Ruangan Gedung B Lantai 5';
		$data['ruangan'] = json_decode($this->curl->simple_get($this->API.'/statusRuangan/gedungBlantai5/',$params));
		$data['content'] = $this->load->view('ruangan/ketstatus_ruanganGBL5', $data, TRUE); 
		$this->load->view('template/main', $data);
	}

	public function statusRuanganGCL1()
	{
		$data['judul'] = 'Status Ruangan Gedung C Lantai 1';
		$data['ruangan'] = json_decode($this->curl->simple_get($this->API.'/statusRuangan/gedungClantai1'));
		$data['content'] = $this->load->view('ruangan/status_ruanganGCL1', $data, TRUE); 
		$this->load->view('template/main', $data);
	}

	public function ketstatusRuanganGCL1($id_jadwal)
	{
		$data['id_jadwal'] = $id_jadwal;
		$params	= array('id_jadwal'=>$this->uri->segment(3));
		$data['judul'] = 'Status Ruangan Gedung C Lantai 1';
		$data['ruangan'] = json_decode($this->curl->simple_get($this->API.'/statusRuangan/gedungClantai1/',$params));
		$data['content'] = $this->load->view('ruangan/ketstatus_ruanganGCL1', $data, TRUE); 
		$this->load->view('template/main', $data);
	}

	public function statusRuanganGCL2()
	{
		$data['judul'] = 'Status Ruangan Gedung C Lantai 2';
		$data['ruangan'] = json_decode($this->curl->simple_get($this->API.'/statusRuangan/gedungClantai2'));
		$data['content'] = $this->load->view('ruangan/status_ruanganGCL2', $data, TRUE); 
		$this->load->view('template/main', $data);
	}

	public function ketstatusRuanganGCL2($id_jadwal)
	{
		$data['id_jadwal'] = $id_jadwal;
		$params	= array('id_jadwal'=>$this->uri->segment(3));
		$data['judul'] = 'Status Ruangan Gedung C Lantai 2';
		$data['ruangan'] = json_decode($this->curl->simple_get($this->API.'/statusRuangan/gedungClantai2/',$params));
		$data['content'] = $this->load->view('ruangan/ketstatus_ruanganGCL2', $data, TRUE); 
		$this->load->view('template/main', $data);
	}

	public function statusRuanganGCL3()
	{
		$data['judul'] = 'Status Ruangan Gedung C Lantai 3';
		$data['ruangan'] = json_decode($this->curl->simple_get($this->API.'/statusRuangan/gedungClantai3'));
		$data['content'] = $this->load->view('ruangan/status_ruanganGCL3', $data, TRUE); 
		$this->load->view('template/main', $data);
	}

	public function ketstatusRuanganGCL3($id_jadwal)
	{
		$data['id_jadwal'] = $id_jadwal;
		$params	= array('id_jadwal'=>$this->uri->segment(3));
		$data['judul'] = 'Status Ruangan Gedung C Lantai 3';
		$data['ruangan'] = json_decode($this->curl->simple_get($this->API.'/statusRuangan/gedungClantai3/',$params));
		$data['content'] = $this->load->view('ruangan/ketstatus_ruanganGCL3', $data, TRUE); 
		$this->load->view('template/main', $data);
	}

	public function statusRuanganGCL4()
	{
		$data['judul'] = 'Status Ruangan Gedung C Lantai 4';
		$data['ruangan'] = json_decode($this->curl->simple_get($this->API.'/statusRuangan/gedungClantai4'));
		$data['content'] = $this->load->view('ruangan/status_ruanganGCL4', $data, TRUE); 
		$this->load->view('template/main', $data);
	}

	public function ketstatusRuanganGCL4($id_jadwal)
	{
		$data['id_jadwal'] = $id_jadwal;
		$params	= array('id_jadwal'=>$this->uri->segment(3));
		$data['judul'] = 'Status Ruangan Gedung C Lantai 4';
		$data['ruangan'] = json_decode($this->curl->simple_get($this->API.'/statusRuangan/gedungClantai4/',$params));
		$data['content'] = $this->load->view('ruangan/ketstatus_ruanganGCL4', $data, TRUE); 
		$this->load->view('template/main', $data);
	}

	public function fasilitasRuangan()
	{
		$data['judul'] = 'Fasilitas Ruangan';
		$data['fasilitasRuang'] = json_decode($this->curl->simple_get($this->API.'/fasilitasRuang'));
		$data['content'] = $this->load->view('ruangan/fasilitas_ruangan', $data, TRUE); 
		$this->load->view('template/main', $data);
	}

	public function lihatKerusakan($id_fasilitasruang)
	{
		//$data['id_fasilitasruang'] = $id_fasilitasruang;
		$data['judul'] = 'Lihat Detail Kerusakan Fasilitas';
		$data['fas']	= json_decode($this->curl->simple_get($this->API.'/lapor/lapor',array('id_fasilitasruang'=>$this->uri->segment(3))));
		$data['content'] = $this->load->view('ruangan/lihat_kerusakan',$data, TRUE);
		$this->load->view('template/main',$data);
	}

	public function edit_kerusakan($id_lapor)
	{
		$id_fasilitasruang =  $this->input->post('id_fasilitasruang');
		if(isset($_POST['submit'])){
            $data = array(
            	'id_lapor'		=>	$id_lapor,
            	'status'      =>  $this->input->post('status'));
            $update =  $this->curl->simple_put($this->API.'/lapor', $data, array(CURLOPT_BUFFERSIZE => 10)); 
            if($update)
            {
                $this->session->set_flashdata('hasil','Update Data Berhasil');
            }else
            {
               $this->session->set_flashdata('hasil','Update Data Gagal');
            }
            redirect('ruangan/lihatKerusakan/'.$id_fasilitasruang)	;
        }else{
            $data['id_lapor'] = $id_lapor;
			$params	= array('id_lapor'=>$this->uri->segment(3));
			$data['judul'] = 'Edit Kerusakan';
			$data['fasilitas'] = json_decode($this->curl->simple_get($this->API.'/fasilitas'));
			$data['fasilitasRuang'] = json_decode($this->curl->simple_get($this->API.'/fasilitasRuang'));
			$data['user'] = json_decode($this->curl->simple_get($this->API.'/user'));
			$data['fas']	= json_decode($this->curl->simple_get($this->API.'/lapor/lapordetail',$params));
			$data['content'] = $this->load->view('ruangan/edit_kerusakan',$data, TRUE);
			$this->load->view('template/main',$data);
        }
	}

	public function tambah_fasilitasRuangan()
	{
		if(isset($_POST['submit'])){
            $data = array(
                'id_fasilitas'      =>  $this->input->post('id_fasilitas'),
            	'jml'      =>  $this->input->post('jml'),
        		'id_ruang'      =>  $this->input->post('id_ruang'));
            $insert =  $this->curl->simple_post($this->API.'/fasilitasRuang', $data, array(CURLOPT_BUFFERSIZE => 10)); 
            if($insert)
            {
                $this->session->set_flashdata('hasil','Insert Data Berhasil');
            }else
            {
               $this->session->set_flashdata('hasil','Insert Data Gagal');
            }
            redirect('ruangan/fasilitasRuangan');
        }else{
        	$data['judul'] = 'Tambah Data Fasilitas Ruangan';
        	$data['fasilitas'] = json_decode($this->curl->simple_get($this->API.'/fasilitas'));
        	$data['ruangan'] = json_decode($this->curl->simple_get($this->API.'/ruangan'));
            $data['content'] = $this->load->view('ruangan/tambah_fasilitasRuangan', $data, TRUE); 
			$this->load->view('template/main', $data);
        }
	}

	public function edit_fasilitasRuangan($id_fasilitasruang)
	{
		if(isset($_POST['submit'])){
            $data = array(
            	'id_fasilitasruang'		=>	$id_fasilitasruang,
                'id_fasilitas'      =>  $this->input->post('id_fasilitas'),
            	'jml'     		 =>  $this->input->post('jml'),
            	'id_ruang'      =>  $this->input->post('id_ruang'));
            $update =  $this->curl->simple_put($this->API.'/fasilitasRuang', $data, array(CURLOPT_BUFFERSIZE => 10)); 
            if($update)
            {
                $this->session->set_flashdata('hasil','Update Data Berhasil');
            }else
            {
               $this->session->set_flashdata('hasil','Update Data Gagal');
            }
            redirect('ruangan/fasilitasRuangan');
        }else{
            $data['id_fasilitasruang'] = $id_fasilitasruang;
			$params	= array('id_fasilitasruang'=>$this->uri->segment(3));
			$data['judul'] = 'Edit Data Fasilitas Ruangan';
			$data['fasilitas'] = json_decode($this->curl->simple_get($this->API.'/fasilitas'));
			$data['ruangan'] = json_decode($this->curl->simple_get($this->API.'/ruangan'));
			$data['fasilitasRuang']	= json_decode($this->curl->simple_get($this->API.'/fasilitasRuang',$params));
			$data['content'] = $this->load->view('ruangan/edit_fasilitasRuangan',$data, TRUE);
			$this->load->view('template/main',$data);
        }
	}


	public function delete_fasilitasRuangan($id_fasilitasruang){
		if(empty($id_fasilitasruang)){
			redirect('ruangan/fasilitasRuangan');
		}else{
			$delete = $this->curl->simple_delete($this->API.'/fasilitasRuang', array('id_fasilitasruang'=>$id_fasilitasruang), array(CURLOPT_BUFFERSIZE => 10));
				if($delete) {
					$this->session->set_flashdata('hasil','Delete Data Berhasil');
				}else{
					$this->session->set_flashdata('hasil','Delete Data Gagal');
				}
				redirect('ruangan/fasilitasRuangan');
			}
	}


	public function jurusan()
	{
		$data['judul'] = 'Data Jurusan';
		$data['jurusan'] = json_decode($this->curl->simple_get($this->API.'/jurusan'));
		$data['content'] = $this->load->view('ruangan/jurusan', $data, TRUE); 
		$this->load->view('template/main', $data);
	}

	public function tambah_jurusan()
	{
		if(isset($_POST['submit'])){
            $data = array(
                'nama_jurusan'      =>  $this->input->post('nama_jurusan'));
            $insert =  $this->curl->simple_post($this->API.'/jurusan', $data, array(CURLOPT_BUFFERSIZE => 10)); 
            if($insert)
            {
                $this->session->set_flashdata('hasil','Insert Data Berhasil');
            }else
            {
               $this->session->set_flashdata('hasil','Insert Data Gagal');
            }
            redirect('ruangan/jurusan');
        }else{
        	$data['judul'] = 'Tambah Data Jurusan';
        	//$data['jurusan'] = json_decode($this->curl->simple_get($this->API.'/jurusan'));
            $data['content'] = $this->load->view('ruangan/tambah_jurusan', $data, TRUE); 
			$this->load->view('template/main', $data);
        }
	}

	public function edit_jurusan($id_jurusan)
	{
		if(isset($_POST['submit'])){
            $data = array(
            	'id_jurusan'		=>	$id_jurusan,
                'nama_jurusan'      =>  $this->input->post('nama_jurusan'));
            $update =  $this->curl->simple_put($this->API.'/jurusan', $data, array(CURLOPT_BUFFERSIZE => 10)); 
            if($update)
            {
                $this->session->set_flashdata('hasil','Update Data Berhasil');
            }else
            {
               $this->session->set_flashdata('hasil','Update Data Gagal');
            }
            redirect('ruangan/jurusan');
        }else{
            $data['id_jurusan'] = $id_jurusan;
			$params	= array('id_jurusan'=>$this->uri->segment(3));
			$data['judul'] = 'Edit Data Jurusan';
			$data['jurusan']	= json_decode($this->curl->simple_get($this->API.'/jurusan',$params));
			$data['content'] = $this->load->view('ruangan/edit_jurusan',$data, TRUE);
			$this->load->view('template/main',$data);
        }
	}

	public function delete_jurusan($id_jurusan){
		if(empty($id_jurusan)){
			redirect('ruangan/jurusan');
		}else{
			$delete = $this->curl->simple_delete($this->API.'/jurusan', array('id_jurusan'=>$id_jurusan), array(CURLOPT_BUFFERSIZE => 10));
				if($delete) {
					$this->session->set_flashdata('hasil','Delete Data Berhasil');
				}else{
					$this->session->set_flashdata('hasil','Delete Data Gagal');
				}
				redirect('ruangan/jurusan');
			}
	}

	public function prodi()
	{
		$data['judul'] = 'Data Prodi';
		$data['prodi'] = json_decode($this->curl->simple_get($this->API.'/prodi'));
		$data['content'] = $this->load->view('ruangan/prodi', $data, TRUE); 
		$this->load->view('template/main', $data);
	}

	public function tambah_prodi()
	{
		if(isset($_POST['submit'])){
            $data = array(
                'nama_prodi'      =>  $this->input->post('nama_prodi'),
                'id_jurusan'      =>  $this->input->post('id_jurusan'),
            );
            $insert =  $this->curl->simple_post($this->API.'/prodi', $data, array(CURLOPT_BUFFERSIZE => 10)); 
            if($insert)
            {
                $this->session->set_flashdata('hasil','Insert Data Berhasil');
            }else
            {
               $this->session->set_flashdata('hasil','Insert Data Gagal');
            }
            redirect('ruangan/prodi');
        }else{
        	$data['judul'] = 'Tambah Data Prodi';
        	$data['prodi'] = json_decode($this->curl->simple_get($this->API.'/prodi'));
        	$data['jurusan'] = json_decode($this->curl->simple_get($this->API.'/jurusan'));
            $data['content'] = $this->load->view('ruangan/tambah_prodi', $data, TRUE); 
			$this->load->view('template/main', $data);
        }
	}

	public function edit_prodi($id_prodi)
	{
		if(isset($_POST['submit'])){
            $data = array(
            	'id_prodi'		=>	$id_prodi,
                'nama_prodi'      =>  $this->input->post('nama_prodi'),
                'id_jurusan'      =>  $this->input->post('id_jurusan'));
            $update =  $this->curl->simple_put($this->API.'/prodi', $data, array(CURLOPT_BUFFERSIZE => 10)); 
            if($update)
            {
                $this->session->set_flashdata('hasil','Update Data Berhasil');
            }else
            {
               $this->session->set_flashdata('hasil','Update Data Gagal');
            }
            redirect('ruangan/prodi');
        }else{
            $data['id_prodi'] = $id_prodi;
			$data['judul'] = 'Edit Data Program Studi';
			$data['jurusan'] = json_decode($this->curl->simple_get($this->API.'/jurusan'));
			$data['prodi']	= json_decode($this->curl->simple_get($this->API.'/prodi',array('id_prodi'=>$this->uri->segment(3))));
			$data['content'] = $this->load->view('ruangan/edit_prodi',$data, TRUE);
			$this->load->view('template/main',$data);
        }
	}

	public function delete_prodi($id_prodi){
		if(empty($id_prodi)){
			redirect('ruangan/prodi');
		}else{
			$delete = $this->curl->simple_delete($this->API.'/prodi', array('id_prodi'=>$id_prodi), array(CURLOPT_BUFFERSIZE => 10));
				if($delete) {
					$this->session->set_flashdata('hasil','Delete Data Berhasil');
				}else{
					$this->session->set_flashdata('hasil','Delete Data Gagal');
				}
				redirect('ruangan/prodi');
			}
	}

	public function kelas()
	{
		$data['judul'] = 'Data Kelas';
		$data['kelas'] = json_decode($this->curl->simple_get($this->API.'/kelas'));
		$data['content'] = $this->load->view('ruangan/kelas', $data, TRUE); 
		$this->load->view('template/main', $data);
	}

	public function tambah_kelas()
	{
		if(isset($_POST['submit'])){
            $data = array(
                'nama_kelas'      =>  $this->input->post('nama_kelas'),
                'id_prodi'      =>  $this->input->post('id_prodi'));
            $insert =  $this->curl->simple_post($this->API.'/kelas', $data, array(CURLOPT_BUFFERSIZE => 10)); 
            if($insert)
            {
                $this->session->set_flashdata('hasil','Insert Data Berhasil');
            }else
            {
               $this->session->set_flashdata('hasil','Insert Data Gagal');
            }
            redirect('ruangan/kelas');
        }else{
        	$data['judul'] = 'Tambah Data kelas';
        	$data['kelas'] = json_decode($this->curl->simple_get($this->API.'/kelas'));
        	$data['prodi'] = json_decode($this->curl->simple_get($this->API.'/prodi'));
            $data['content'] = $this->load->view('ruangan/tambah_kelas', $data, TRUE); 
			$this->load->view('template/main', $data);
        }
	}

	public function edit_kelas($id_kelas)
	{
		if(isset($_POST['submit'])){
            $data = array(
            	'id_kelas'		=>	$id_kelas,
                'nama_kelas'      =>  $this->input->post('nama_kelas'),
                'id_prodi'      =>  $this->input->post('id_prodi'));
            $update =  $this->curl->simple_put($this->API.'/kelas', $data, array(CURLOPT_BUFFERSIZE => 10)); 
            if($update)
            {
                $this->session->set_flashdata('hasil','Update Data Berhasil');
            }else
            {
               $this->session->set_flashdata('hasil','Update Data Gagal');
            }
            redirect('ruangan/kelas');
        }else{
            $data['id_kelas'] = $id_kelas;
			$data['judul'] = 'Edit Data Kelas';
			$data['prodi'] = json_decode($this->curl->simple_get($this->API.'/prodi'));
			$data['kelas']	= json_decode($this->curl->simple_get($this->API.'/kelas',array('id_kelas'=>$this->uri->segment(3))));
			$data['content'] = $this->load->view('ruangan/edit_kelas',$data, TRUE);
			$this->load->view('template/main',$data);
        }
	}

	public function delete_kelas($id_kelas){
		if(empty($id_kelas)){
			redirect('ruangan/kelas');
		}else{
			$delete = $this->curl->simple_delete($this->API.'/kelas', array('id_kelas'=>$id_kelas), array(CURLOPT_BUFFERSIZE => 10));
				if($delete) {
					$this->session->set_flashdata('hasil','Delete Data Berhasil');
				}else{
					$this->session->set_flashdata('hasil','Delete Data Gagal');
				}
				redirect('ruangan/kelas');
			}
	}

	public function ruangan()
	{
		$data['judul'] = 'Data Ruangan';
		$data['ruangan'] = json_decode($this->curl->simple_get($this->API.'/ruangan'));
		$data['content'] = $this->load->view('ruangan/ruangan', $data, TRUE); 
		$this->load->view('template/main', $data);
	}

	public function tambah_ruangan()
	{
		if(isset($_POST['submit'])){
            $data = array(
                'nama_ruang'      =>  $this->input->post('nama_ruang'),
                'id_lantai'      =>  $this->input->post('id_lantai'),
                'status_ruang'      =>  $this->input->post('status_ruang'));
            $insert =  $this->curl->simple_post($this->API.'/ruangan', $data, array(CURLOPT_BUFFERSIZE => 10)); 
            if($insert)
            {
                $this->session->set_flashdata('hasil','Insert Data Berhasil');
            }else
            {
               $this->session->set_flashdata('hasil','Insert Data Gagal');
            }
            redirect('ruangan/ruangan');
        }else{
        	$data['judul'] = 'Tambah Data Ruangan';
        	$data['lantai'] = json_decode($this->curl->simple_get($this->API.'/lantai'));
            $data['content'] = $this->load->view('ruangan/tambah_ruangan', $data, TRUE); 
			$this->load->view('template/main', $data);
        }
	}

	public function edit_ruangan($id_ruang)
	{
		if(isset($_POST['submit'])){
            $data = array(
            	'id_ruang'		=>	$id_ruang,
                'nama_ruang'      =>  $this->input->post('nama_ruang'),
                'id_lantai'      =>  $this->input->post('id_lantai'),
                'status_ruang'      =>  $this->input->post('status_ruang'));
            $update =  $this->curl->simple_put($this->API.'/ruangan', $data, array(CURLOPT_BUFFERSIZE => 10)); 
            if($update)
            {
                $this->session->set_flashdata('hasil','Update Data Berhasil');
            }else
            {
               $this->session->set_flashdata('hasil','Update Data Gagal');
            }
            redirect('ruangan/ruangan');
        }else{
            $data['id_ruang'] = $id_ruang;
			$data['judul'] = 'Edit Data Ruangan';
			$data['lantai'] = json_decode($this->curl->simple_get($this->API.'/lantai'));
			$data['ruangan']	= json_decode($this->curl->simple_get($this->API.'/ruangan',array('id_ruang'=>$this->uri->segment(3))));
			$data['content'] = $this->load->view('ruangan/edit_ruangan',$data, TRUE);
			$this->load->view('template/main',$data);
        }
	}

	public function delete_ruangan($id_ruang){
		if(empty($id_ruang)){
			redirect('ruangan/ruangan');
		}else{
			$delete = $this->curl->simple_delete($this->API.'/ruangan', array('id_ruang'=>$id_ruang), array(CURLOPT_BUFFERSIZE => 10));
				if($delete) {
					$this->session->set_flashdata('hasil','Delete Data Berhasil');
				}else{
					$this->session->set_flashdata('hasil','Delete Data Gagal');
				}
				redirect('ruangan/ruangan');
			}
	}

	public function lihat_fasilitas($id_ruang)
	{
        $data['id_ruang'] = $id_ruang;
		$data['judul'] = 'Lihat Data Fasilitas Ruangan';
		$data['fas']	= json_decode($this->curl->simple_get($this->API.'/fasilitasRuang/fas',array('id_ruang'=>$this->uri->segment(3))));
		$data['content'] = $this->load->view('ruangan/lihat_fasilitas',$data, TRUE);
		$this->load->view('template/main',$data);
        
	}

	public function waktu()
	{
		$data['judul'] = 'Data Jam / Waktu';
		$data['waktu'] = json_decode($this->curl->simple_get($this->API.'/waktu'));
		$data['content'] = $this->load->view('ruangan/waktu', $data, TRUE); 
		$this->load->view('template/main', $data);
	}

	public function tambah_waktu()
	{
		if(isset($_POST['submit'])){
            $data = array(
                'hari'      =>  $this->input->post('hari'),
                'jamke'      =>  $this->input->post('jamke'),
                'jam_mulai'      =>  $this->input->post('jam_mulai'),
            	'jam_selesai'      =>  $this->input->post('jam_selesai'));
            $insert =  $this->curl->simple_post($this->API.'/waktu', $data, array(CURLOPT_BUFFERSIZE => 10)); 
            if($insert)
            {
                $this->session->set_flashdata('hasil','Insert Data Berhasil');
            }else
            {
               $this->session->set_flashdata('hasil','Insert Data Gagal');
            }
            redirect('ruangan/waktu');
        }else{
        	$data['judul'] = 'Tambah Data Waktu';
            $data['content'] = $this->load->view('ruangan/tambah_waktu', $data, TRUE); 
			$this->load->view('template/main', $data);
        }
	}

	public function edit_waktu($id_waktu)
	{
		if(isset($_POST['submit'])){
            $data = array(
            	'id_waktu'		=>	$id_waktu,
                'hari'      =>  $this->input->post('hari'),
                'jamke'      =>  $this->input->post('jamke'),
            	'jam_mulai'      =>  $this->input->post('jam_mulai'),
            	'jam_selesai'      =>  $this->input->post('jam_selesai'));
            $update =  $this->curl->simple_put($this->API.'/waktu', $data, array(CURLOPT_BUFFERSIZE => 10)); 
            if($update)
            {
                $this->session->set_flashdata('hasil','Update Data Berhasil');
            }else
            {
               $this->session->set_flashdata('hasil','Update Data Gagal');
            }
            redirect('ruangan/waktu');
        }else{
            $data['id_waktu'] = $id_waktu;
			$data['judul'] = 'Edit Data Waktu';
			$data['waktu']	= json_decode($this->curl->simple_get($this->API.'/waktu',array('id_waktu'=>$this->uri->segment(3))));
			$data['content'] = $this->load->view('ruangan/edit_Waktu',$data, TRUE);
			$this->load->view('template/main',$data);
        }
	}

	public function delete_waktu($id_waktu){
		if(empty($id_waktu)){
			redirect('ruangan/waktu');
		}else{
			$delete = $this->curl->simple_delete($this->API.'/waktu', array('id_waktu'=>$id_waktu), array(CURLOPT_BUFFERSIZE => 10));
				if($delete) {
					$this->session->set_flashdata('hasil','Delete Data Berhasil');
				}else{
					$this->session->set_flashdata('hasil','Delete Data Gagal');
				}
				redirect('ruangan/waktu');
			}
	}

	public function fasilitas()
	{
		$data['judul'] = 'Data Nama Fasilitas';
		$data['fasilitas'] = json_decode($this->curl->simple_get($this->API.'/fasilitas'));
		$data['content'] = $this->load->view('ruangan/fasilitas', $data, TRUE); 
		$this->load->view('template/main', $data);
	}

	public function tambah_fasilitas()
	{
		if(isset($_POST['submit'])){
            $data = array(
                'nama_fasilitas'      =>  $this->input->post('nama_fasilitas'));
            $insert =  $this->curl->simple_post($this->API.'/fasilitas', $data, array(CURLOPT_BUFFERSIZE => 10)); 
            if($insert)
            {
                $this->session->set_flashdata('hasil','Insert Data Berhasil');
            }else
            {
               $this->session->set_flashdata('hasil','Insert Data Gagal');
            }
            redirect('ruangan/fasilitas');
        }else{
        	$data['judul'] = 'Tambah Data Nama Fasilitas';
            $data['content'] = $this->load->view('ruangan/tambah_fasilitas', $data, TRUE); 
			$this->load->view('template/main', $data);
        }
	}

	public function edit_fasilitas($id_fasilitas)
	{
		if(isset($_POST['submit'])){
            $data = array(
            	'id_fasilitas'		=>	$id_fasilitas,
                'nama_fasilitas'      =>  $this->input->post('nama_fasilitas'));
            $update =  $this->curl->simple_put($this->API.'/fasilitas', $data, array(CURLOPT_BUFFERSIZE => 10)); 
            if($update)
            {
                $this->session->set_flashdata('hasil','Update Data Berhasil');
            }else
            {
               $this->session->set_flashdata('hasil','Update Data Gagal');
            }
            redirect('ruangan/fasilitas');
        }else{
            $data['id_fasilitas'] = $id_fasilitas;
			$data['judul'] = 'Edit Data Nama Fasilitas';
			$data['fasilitas']	= json_decode($this->curl->simple_get($this->API.'/fasilitas',array('id_fasilitas'=>$this->uri->segment(3))));
			$data['content'] = $this->load->view('ruangan/edit_fasilitas',$data, TRUE);
			$this->load->view('template/main',$data);
        }
	}

	public function delete_fasilitas($id_fasilitas){
		if(empty($id_fasilitas)){
			redirect('ruangan/fasilitas');
		}else{
			$delete = $this->curl->simple_delete($this->API.'/fasilitas', array('id_fasilitas'=>$id_fasilitas), array(CURLOPT_BUFFERSIZE => 10));
				if($delete) {
					$this->session->set_flashdata('hasil','Delete Data Berhasil');
				}else{
					$this->session->set_flashdata('hasil','Delete Data Gagal');
				}
				redirect('ruangan/fasilitas');
			}
	}
}

/* End of file ruangan.php */
/* Location: ./application/controllers/ruangan.php */