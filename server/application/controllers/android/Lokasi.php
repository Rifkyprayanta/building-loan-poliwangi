<?php
require APPPATH . '/libraries/REST_Controller.php';

class Lokasi extends REST_Controller{
	
	function gedung_get() {
		$gedung = $this->db->get('gedung')->result();
		$this->response(array("status"=>"success","result" => $gedung));
	}
	function berita_get() {
		$gedung = $this->db->get('berita')->result();
		$this->response(array("status"=>"success","result" => $gedung));
	}
	function lantai_get() {
		$id_gedung = $this->get('id_gedung');
		if ($id_gedung == '') {
			$lantai = $this->db->get('lantai')->result();
		} else {
			$this->db->where('id_gedung', $id_gedung);
			$lantai = $this->db->get('lantai')->result();
		}
		$this->response(array("status"=>"success","result" => $lantai));
	}
	function ruang_get() {
		$id_lantai = $this->get('id_lantai');
		if ($id_lantai == '') {
			$ruang = $this->db->get('ruang')->result();
		} else {
			$this->db->where('id_lantai', $id_lantai);
			$ruang = $this->db->get('ruang')->result();
		}
		$this->response(array("status"=>"success","result" => $ruang));
	}
	function fasilitasbyRuang_get()
	{
		$id_ruang = $this->get('id_ruang');
		if ($id_ruang == '') {
			$fas = $this->db->get('fasilitasruang')->result();
		} else {
			$this->db->join('fasilitas', 'fasilitas.id_fasilitas = fasilitasruang.id_fasilitas');
			$this->db->where('id_ruang', $id_ruang);
			$fas = $this->db->get('fasilitasruang')->result();
		}
		$this->response(array("status"=>"success","result" => $fas));
	}
	function jadwalbyRuang_get()
	{
		$id_ruang = $this->get('id_ruang');
		if ($id_ruang == '') {
			$j = $this->db->get('jadwal')->result();
		} else {
			
			
			$j = $this->db->query("
				select * FROM `jadwal` 
				join waktu on jadwal.id_waktu=waktu.id_waktu
				join kelas on kelas.id_kelas=jadwal.id_kelas
				join ruang on jadwal.id_ruang=ruang.id_ruang
				
				join matakuliah on matakuliah.id_matakuliah=jadwal.id_matakuliah
				WHERE jadwal.id_ruang='".$id_ruang."'
				")->result();
			
		}
		$this->response(array("status"=>"success","result" => $j));
	}
	function jadwalbyKelas_get(){
		$id_kelas = $this->get('id_kelas');
		if ($id_kelas == '') {
			$j = $this->db->get('jadwal')->result();
		} else {
			
			
			$j = $this->db->query("
				select * FROM `jadwal` 
				join waktu on jadwal.id_waktu=waktu.id_waktu
				join kelas on kelas.id_kelas=jadwal.id_kelas
				join ruang on jadwal.id_ruang=ruang.id_ruang
				join matakuliah on matakuliah.id_matakuliah=jadwal.id_matakuliah
				WHERE jadwal.id_kelas='".$id_kelas."'
				")->result();
		}
		$this->response(array("status"=>"success","result" => $j));
	}
	

	function ruangLapor_get() {
		$id_lantai = $this->get('id_lantai');
		if ($id_lantai<>'') {

			$ruang = $this->db->query("
				select distinct ruang.id_ruang,ruang.* from ruang WHERE status_ruang='rusak' and id_lantai='".$id_lantai."'
				")->result();
		} else {
			$this->db->join('ruang', 'ruang.id_ruang = lapor.id_ruang');
			$ruang = $this->db->get('lapor')->result();
		}
		
		$this->response(array("status"=>"success","result" => $ruang));
	}
	function ruangPinjam_get() {
		$id_lantai = $this->get('id_lantai');
		if ($id_lantai<>'') {

			$ruang = $this->db->query("
				select distinct ruang.id_ruang, ruang.nama_ruang, pinjam_tmp.status
				from ruang 
				join pinjam_tmp on pinjam_tmp.id_ruang=ruang.id_ruang
				where  status_ruang<> 'rusak' AND pinjam_tmp.status<>'dikembalikan' and id_lantai='".$id_lantai."'
				")->result();
		} else {
			$this->db->join('ruang', 'ruang.id_ruang = lapor.id_ruang');
			$ruang = $this->db->get('lapor')->result();
		}
		
		$this->response(array("status"=>"success","result" => $ruang));
	}
	function getHari($h){
		switch ($h){
			case 1: 
			return "senin";
			break;
			case 2:
			return "selasa";
			break;
			case 3:
			return "rabu";
			break;
			case 4:
			return "kamis";
			break;
			case 5:
			return "jumat";
			break;
			case 6:
			return "sabtu";
			break;
			case 0:
			return "minggu";
			break;
			
		}
	} 
	function ruangJadwal_get() {
		$id_lantai = $this->get('id_lantai');
		$g =getdate();
		$a=$g['wday'];
		$hari=$this->getHari($a);

		if ($id_lantai<>'') {

			$ruang = $this->db->query("
				select distinct ruang.id_ruang, ruang.nama_ruang, ruang.status_ruang from ruang 
				join jadwal on jadwal.id_ruang=ruang.id_ruang
				left join pinjam_tmp on pinjam_tmp.id_ruang=ruang.id_ruang
				
				join waktu on waktu.id_waktu=jadwal.id_waktu
				where status_ruang<>'rusak' and (pinjam_tmp.status is null or pinjam_tmp.status='dikembalikan') and id_lantai='".$id_lantai."' and waktu.hari=(select  case
				when date_format(now(),'%w') = 0 THEN 'minggu'
				when date_format(now(),'%w') = 1 THEN 'senin'
				when date_format(now(),'%w') = 2 THEN 'selasa'
				when date_format(now(),'%w') = 3 THEN 'rabu'
				when date_format(now(),'%w') = 4 THEN 'kamis'
				when date_format(now(),'%w') = 5 THEN 'jumat'
				when date_format(now(),'%w') = 6 THEN 'sabtu'
				end )
				")->result();
		} else {
			$this->response(array("status"=>"failed","massage" => "no db"));
		}
		
		$this->response(array("status"=>"success","result" => $ruang));
	}


	// per waktu
				// select distinct jadwal.id_ruang, ruang.nama_ruang, pinjam.status, ruang.status_ruang from ruang 
				// join jadwal on jadwal.id_ruang=ruang.id_ruang
				// left join pinjam on pinjam.id_ruang=ruang.id_ruang
				// where status_ruang<>'rusak' and (pinjam.status is null or pinjam.status='dikembalikan') and id_lantai='".$id_lantai."' and id_waktu=(SELECT id_Waktu FROM `waktu`
				// where hari=(select  case
				// when date_format(now(),'%w') = 0 THEN 'minggu'
				// when date_format(now(),'%w') = 1 THEN 'senin'
				// when date_format(now(),'%w') = 2 THEN 'selasa'
				// when date_format(now(),'%w') = 3 THEN 'rabu'
				// when date_format(now(),'%w') = 4 THEN 'kamis'
				// when date_format(now(),'%w') = 5 THEN 'jumat'
				// when date_format(now(),'%w') = 6 THEN 'sabtu'
				// end as harinow) and (select date_format(now(),'%h:%m:%s') as jamnow)>=jam_mulai and (select date_format(now(),'%h:%m:%s') as jamnow)<jam_selesai)


	function ruangJadwalnowaktu_get() {
		$id_lantai = $this->get('id_lantai');
		$g =getdate();
		$a=$g['wday'];
		$hari=$this->getHari($a);

		if ($id_lantai<>'') {

			$ruang = $this->db->query("
				select distinct ruang.id_ruang, ruang.nama_ruang, ruang.status_ruang from ruang 
				join jadwal on jadwal.id_ruang=ruang.id_ruang
				left join pinjam_tmp on pinjam_tmp.id_ruang=ruang.id_ruang
				
				join waktu on waktu.id_waktu=jadwal.id_waktu
				where status_ruang<>'rusak' and (pinjam_tmp.status is null or pinjam_tmp.status='dikembalikan') and id_lantai='".$id_lantai."' and waktu.hari<>(select  case
				when date_format(now(),'%w') = 0 THEN 'minggu'
				when date_format(now(),'%w') = 1 THEN 'senin'
				when date_format(now(),'%w') = 2 THEN 'selasa'
				when date_format(now(),'%w') = 3 THEN 'rabu'
				when date_format(now(),'%w') = 4 THEN 'kamis'
				when date_format(now(),'%w') = 5 THEN 'jumat'
				when date_format(now(),'%w') = 6 THEN 'sabtu'
				end )
				")->result();
		} else {
			$this->response(array("status"=>"failed","massage" => "no db"));
		}
		
		$this->response(array("status"=>"success","result" => $ruang));
	}

	
	function ruangLaporno_get() {
		$id_lantai = $this->get('id_lantai');
		if ($id_lantai<>'') {
			$ruang = $this->db->query("
				select distinct ruang.id_ruang, ruang.* from ruang 
				left join jadwal on jadwal.id_ruang=ruang.id_ruang
				left join pinjam_tmp on pinjam_tmp.id_ruang=ruang.id_ruang
				where status_ruang<>'rusak' and jadwal.id_ruang is null and pinjam_tmp.id_ruang is null and id_lantai='".$id_lantai."' 
				")->result();
		} else {
			$this->db->join('ruang', 'ruang.id_ruang = lapor.id_ruang');
			$ruang = $this->db->get('lapor')->result();
		}
		
		$this->response(array("status"=>"success","result" => $ruang));
	}

	
}
?>