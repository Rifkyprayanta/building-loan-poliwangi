<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mata_kuliah extends CI_Controller {
	private $filename = "import_data";
	var $API ="";

	function __construct(){
		parent::__construct();
		$this->load->helper(array('form', 'url'));
		$this->load->model('Model_jadwal');
		$this->API="http://localhost/peminjamangedung/server/";
	
		if($this->session->userdata('status') != "login" || $this->session->userdata('akses')!='0'){
			redirect(base_url("login"));
		}
	}

	public function form(){
    $data = array(); // Buat variabel $data sebagai array
    
    if(isset($_POST['preview'])){ // Jika user menekan tombol Preview pada form
      // lakukan upload file dengan memanggil function upload yang ada di SiswaModel.php
      $upload = $this->Model_jadwal->upload_file($this->filename);
      
      if($upload['result'] == "success"){ // Jika proses upload sukses
        // Load plugin PHPExcel nya
        include APPPATH.'library/PHPExcel/PHPExcel.php';
        
        $excelreader = new PHPExcel_Reader_Excel2007();
        $loadexcel = $excelreader->load('excel/'.$this->filename.'.xlsx'); // Load file yang tadi diupload ke folder excel
        $sheet = $loadexcel->getActiveSheet()->toArray(null, true, true ,true);
        
        // Masukan variabel $sheet ke dalam array data yang nantinya akan di kirim ke file form.php
        // Variabel $sheet tersebut berisi data-data yang sudah diinput di dalam excel yang sudha di upload sebelumnya
        $data['sheet'] = $sheet; 
      }else{ // Jika proses upload gagal
        $data['upload_error'] = $upload['error']; // Ambil pesan error uploadnya untuk dikirim ke file form dan ditampilkan
      	}
    }
   	 $this->load->view('form', $data);
  	}

  	public function import()
  	{
    // Load plugin PHPExcel nya
    	include APPPATH.'library/PHPExcel/PHPExcel.php';
    
    	$excelreader = new PHPExcel_Reader_Excel2007();
    	$loadexcel = $excelreader->load('excel/'.$this->filename.'.xlsx'); // Load file yang telah diupload ke folder excel
    	$sheet = $loadexcel->getActiveSheet()->toArray(null, true, true ,true);
    
    // Buat sebuah variabel array untuk menampung array data yg akan kita insert ke database
    	$data = array();
    
    	$numrow = 1;
    	foreach($sheet as $row){
      // Cek $numrow apakah lebih dari 1
      // Artinya karena baris pertama adalah nama-nama kolom
      // Jadi dilewat saja, tidak usah diimport
      	if($numrow > 1){
        // Kita push (add) array data ke variabel data
        array_push($data, array(
          'nama_matkul'=>$row['A'], // Insert data nis dari kolom A di excel
          'tahun_ajaran'=>$row['B'], // Insert data nama dari kolom B di excel
          'semester'=>$row['C'], // Insert data jenis kelamin dari kolom C di excel
          'id_kelas'=>$row['D'],
          'id_ruang'=>$row['E'],
          'id_waktu'=>$row['F'], // Insert data alamat dari kolom D di excel
        ));
      }
      
      $numrow++; // Tambah 1 setiap kali looping
    }
    // Panggil fungsi insert_multiple yg telah kita buat sebelumnya di model
    $this->Model_jadwal->insert_multiple($data);
    
    redirect("mata_kuliah/"); // Redirect ke halaman awal (ke controller siswa fungsi index)
  }



	public function index()
	{
		$data['judul'] = 'Kelola Mata Kuliah';
		$data['matkul'] = json_decode($this->curl->simple_get($this->API.'/matkul'));
		$data['content'] = $this->load->view('mata_kuliah/lihat_matkul', $data, TRUE); 
		$this->load->view('template/main', $data);
	}

	public function tambah_matkul()
	{
		if(isset($_POST['submit'])){
            $data = array(
                'nama_matkul'   =>  $this->input->post('nama_matkul'),
            	'id_kelas'      =>  $this->input->post('id_kelas'),
        		'id_ruang'      =>  $this->input->post('id_ruang'),
        		'id_waktu'      =>  $this->input->post('id_waktu'),
        		'tahun_ajaran'  =>  $this->input->post('tahun_ajaran'),
        		'semester'      =>  $this->input->post('semester'));
            $insert =  $this->curl->simple_post($this->API.'/matkul', $data, array(CURLOPT_BUFFERSIZE => 10)); 
            if($insert)
            {
                $this->session->set_flashdata('hasil','Insert Data Berhasil');
            }else
            {
               $this->session->set_flashdata('hasil','Insert Data Gagal');
            }
            redirect('mata_kuliah/');
        }else{
        	$data['judul'] = 'Tambah Mata Kuliah';
			$data['kelas'] = json_decode($this->curl->simple_get($this->API.'/kelas'));
			$data['ruangan'] = json_decode($this->curl->simple_get($this->API.'/ruangan'));
			$data['waktu'] = json_decode($this->curl->simple_get($this->API.'/waktu'));
			$data['content'] = $this->load->view('mata_kuliah/tambah_matkul', $data, TRUE); 
			$this->load->view('template/main', $data);
        }
	}

	public function edit_matkul($id_matakuliah)
	{
		if(isset($_POST['submit'])){
            $data = array(
            	'id_matakuliah'		=>	$id_matakuliah,
            	'nama_matkul'      =>  $this->input->post('nama_matkul'),
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
            $data['id_matakuliah'] = $id_matakuliah;
			$data['judul'] = 'Edit Mata Kuliah';
			$data['kelas'] = json_decode($this->curl->simple_get($this->API.'/kelas'));
			$data['ruangan'] = json_decode($this->curl->simple_get($this->API.'/ruangan'));
			$data['waktu'] = json_decode($this->curl->simple_get($this->API.'/waktu'));
			$data['matkul'] = json_decode($this->curl->simple_get($this->API.'/matkul',array('id_matakuliah'=>$this->uri->segment(3))));
			$data['content'] = $this->load->view('mata_kuliah/edit_matkul',$data, TRUE);
			$this->load->view('template/main',$data);
        }
	}

	public function hapus_matkul($id_matakuliah){
		if(empty($id_matakuliah)){
			redirect('mata_kuliah/');
		}else{
			$delete = $this->curl->simple_delete($this->API.'/matkul', array('id_matakuliah'=>$id_matakuliah), array(CURLOPT_BUFFERSIZE => 10));
				if($delete) {
					$this->session->set_flashdata('hasil','Delete Data Berhasil');
				}else{
					$this->session->set_flashdata('hasil','Delete Data Gagal');
				}
				redirect('mata_kuliah/');
			}
	}

}

/* End of file mata_kuliah.php */
/* Location: ./application/controllers/mata_kuliah.php */