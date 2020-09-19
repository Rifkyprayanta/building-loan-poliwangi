<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller {

	var $API ="";

	function __construct(){
		parent::__construct();
		$this->load->helper(array('form', 'url'));
		$this->load->library('pdf');
		$this->load->model('model_laporan');
		$this->API="http://localhost/peminjamangedung/server/";
	
		if($this->session->userdata('status') != "login" || $this->session->userdata('akses')!='0' && $this->session->userdata('akses')!='1'){
			redirect(base_url("login"));
		}
	}

	//function untuk menampilkan view halaman admin, dan memanggil template. 

	public function index()
	{
		$data['judul'] = 'Laporan Peminjaman Ruangan';
		$data['laporan'] = json_decode($this->curl->simple_get($this->API.'/laporan'));
		$data['content'] = $this->load->view('laporan/laporan', $data, TRUE); 
		$this->load->view('template/main', $data);
	}

	public function search()
	{
		if(isset($_POST['cari']))
		{
			$data['judul'] = 'Laporan Peminjaman Ruangan';
			$keyword = $this->input->post('tanggal');
			$keyword1 = $this->input->post('tanggal1');
			$data['laporan']=$this->model_laporan->get_laporan($keyword, $keyword1);
			$data['content'] = $this->load->view('laporan/laporan', $data, TRUE); 
			$this->load->view('template/main', $data);
		}
		
		else
		{
			redirect('laporan/');
		}
	}

	public function cetak()
	{
		if(isset($_POST['cetak']))
		{
			$keyword = $this->input->post('tanggal');
			$keyword1 = $this->input->post('tanggal1');
			$this->db->select("pinjam.*, ruang.*, COUNT(pinjam.id_ruang) as jumlah, date_format(pinjam.tgl_pinjam, '%d/%m/%y') as tanggalan");
			$this->db->from("pinjam");
			$this->db->join("ruang", "pinjam.id_ruang = ruang.id_ruang");
			$this->db->where("pinjam.tgl_pinjam >=", $keyword);
			$this->db->where("pinjam.tgl_pinjam <=", $keyword1);
			$this->db->group_by("pinjam.id_ruang");
			$laporan = $this->db->get('')->result();

			$pdf = new FPDF('P','mm','A4');
        // membuat halaman baru
        	$pdf->AddPage();
        	$pdf->Image('assets/login/images/poliwangi.png',5,4,23,23);
        // setting jenis font yang akan digunakan
        	$pdf->SetFont('Arial','B',14);
        // mencetak string 
        	$pdf->Cell(200,7,'KEMENTERIAN RISET, TEKNOLOGI, DAN PENDIDIKAN TINGGI',0,1,'C');
        	$pdf->Cell(200,5,'POLITEKNIK NEGERI BANYUWANGI',0,1,'C');
        	$pdf->SetFont('Arial','',12);
        	$pdf->Cell(200,5,'Jl. Raya Jember KM. 13 Labanasem, Kabat, Banyuwangi, 68461',0,1,'C');
        	$pdf->Cell(200,5,'Email : jpc@poliwangi.ac.id; Telepon: (0333) - 676380',0,1,'C');
        	//$pdf->SetLineWidth(1);
        	$pdf->Cell(100,3,'_____________________________________________________________________________________',0,1);

        	$pdf->SetFont('Arial','B',12);
        	$pdf->Cell(190,10,'DAFTAR LAPORAN PEMINJAMAN GEDUNG PER PERIODE',0,1,'C');
        	$pdf->Cell(10,7,'',0,1);
        	$pdf->SetFont('Arial','B',12);
        	$pdf->Cell(10,6,'No',1,0,'C');
        	$pdf->Cell(65,6,'Nama Ruang',1,0,'C');
        	$pdf->Cell(65,6,'Tanggal',1,0,'C');
        	$pdf->Cell(60,6,'Peminjaman',1,1,'C');
        	$pdf->SetFont('Arial','',10);
        	$no = 1;
			foreach ($laporan as $a){
			$pdf->Cell(10,6,$no++,1,0);
            $pdf->Cell(65,6,$a->nama_ruang,1,0);
            $pdf->Cell(65,6,$a->tanggalan,1,0);
            $pdf->Cell(60,6,$a->jumlah,1,1);

        	}
        	$pdf->Output();
		}
	}

}

/* End of file laporan.php */
/* Location: ./application/controllers/laporan.php */