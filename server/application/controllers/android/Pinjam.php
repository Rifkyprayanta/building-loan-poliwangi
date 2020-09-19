<?php
require APPPATH . '/libraries/REST_Controller.php';

class Pinjam extends REST_Controller{
	
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
// 	function getDataPinjam_get()
// {
// 	$id_ruang = $this->get('id_ruang');
// 	if ($id_ruang == '') {
// 		$this->response(array("status"=>"failed","massage" => "id ruang kosong"));
// 	} else {
// //cari id waktu
// 		date_default_timezone_set('Asia/Jakarta');
// 		$g =getdate();
// 		$a=$g['wday'];
// 		$hari=$this->getHari($a);

// 				$j = $this->db->query("
// 				select * from jadwal 
// 				where jadwal.id_ruang='".$id_ruang."' and jadwal.id_waktu=(SELECT id_waktu FROM `waktu` where jam_mulai <=  TIME(NOW()) and jam_selesai >  TIME(NOW()) and hari= '".$hari."')
// 				")->result();

// 		if ($j == null) {
// 			$this->response(array("status"=>"failed","massage" => "tdk ada jadwal"));
// 		} else {
// 		$this->response(array("status"=>"success","result" => $j));
// 		}
	
// 	}
// }

		function getData_get(){
		$id_ruang = $this->get('id_ruang');
		date_default_timezone_set('Asia/Jakarta');
		$g =getdate();
		$a=$g['wday'];
		$hari=$this->getHari($a);



		$j = $this->db->query("
			select id_jadwal from jadwal 
			where jadwal.id_ruang='".$id_ruang."' and jadwal.id_waktu=(SELECT id_waktu FROM `waktu` where jam_mulai <=  TIME(NOW()) and jam_selesai >  TIME(NOW()) and hari= '".$hari."')
			")->result();

		if ($j=='') {

			$this->response(array("status"=>"failed","message" =>"jadwal kosong"));
		} else {

			$this->response(array("status"=>"success","result" => $j));


		}

	}
	function getDataPinjam_get(){
		$id_ruang = $this->get('id_ruang');
		date_default_timezone_set('Asia/Jakarta');
		$g =getdate();
		$a=$g['wday'];
		$hari=$this->getHari($a);



		$j = $this->db->query("
			select id_jadwal from jadwal 
			where jadwal.id_ruang='".$id_ruang."' and jadwal.id_waktu=(SELECT id_waktu FROM `waktu` where jam_mulai <=  TIME(NOW()) and jam_selesai >  TIME(NOW()) and hari= '".$hari."')
			")->row();

// $id_jadwal='';

	// foreach ($j as $key) {
		$id_jadwal = $j->id_jadwal;
	// 			}
		if ($id_jadwal=='') {

			$this->response(array("status"=>"failed","message" =>"jadwal kosong"));
		} else {
			$cek = $this->db->query("
				select * FROM jadwal
				join waktu on waktu.id_waktu=jadwal.id_waktu
				join kelas on kelas.id_kelas=jadwal.id_kelas
				join ruang on jadwal.id_ruang=ruang.id_ruang
				join prodi on kelas.id_prodi=prodi.id_prodi
				where id_jadwal ='".$id_jadwal."'
				")->result();

			$this->response(array("status"=>"success","result" => $cek));


		}

	}
	
	function pinjamOtomatis_get(){
			//cari id waktu
		date_default_timezone_set('Asia/Jakarta');
		$g =getdate();
		$a=$g['wday'];
		$hari=$this->getHari($a);

		$h=$g['hours'];
		$m=$g['minutes'];
		$s=$g['seconds'];
		$jam = "$h:$m:$s";

		$this->db->where('jam_mulai<=', $jam);
		$this->db->where('jam_selesai>', $jam);
		$this->db->where('hari', $hari);
		$c=$this->db->get('waktu')->row();

		$id_waktu = $c->id_waktu;
		$data['id_user'] = $this->get('id_user');
		$data['id_ruang'] = $this->get('id_ruang');

		$this->db->where('jadwal.id_ruang', $data['id_ruang']);
		$this->db->where('jadwal.id_waktu', $id_waktu);
		$j = $this->db->get('jadwal')->row();
		$kelasJadwal = $j->id_kelas;

		$this->db->where('user.id_user', $data['id_user']);
		$u = $this->db->get('user')->row();
		$kelasUser = $u->id_kelas;

		if ($kelasJadwal==$kelasUser) {
			//insert tabel pinjam
			$data['status'] = "booking";
			$g =getdate();
			$d=$g['mday'];
			$m=$g['mon'];
			$y=$g['year'];
			$data['tgl_pinjam'] = "$y:$m:$d";
			$data['timestamp'] = "$y-$m-$d $h:$m:$s";

			$this->db->where('id_waktu', $id_waktu);
			$w= $this->db->get('waktu')->row();
			$data['jam_mulai'] = $w->jam_mulai;
			$data['jam_selesai'] = $w->jam_selesai;

			$insert= $this->db->insert('pinjam',$data);
			$insert= $this->db->insert('pinjam_tmp',$data);

			if ($insert){
				$this->response(array('status'=>'success','message' => 'Berhasil Pinjam'));
			}else{
				$this->response(array('status'=>'fail','message' => 'gagal insert'));
			}

		} else {
			$this->response(array('status' => "fail", 'message'=>"Bukan Jadwal Anda"));
		}
	}
	
	function pinjamManual_post(){
		date_default_timezone_set('Asia/Jakarta');

		$data['id_user'] = $this->post('id_user');
		$data['id_ruang'] = $this->post('id_ruang');

		
		$data['status'] = "booking";
		$data['tgl_pinjam'] = $this->post('tgl_pinjam');
		$data['jam_mulai'] = $this->post('jam_mulai');
		$data['jam_selesai'] = $this->post('jam_selesai');
		
		if (empty($data['tgl_pinjam'])) {
			$this->response(array('status' => "fail", "message"=>"tanggal harus diisi"));
		} else if (empty($data['jam_mulai'])) {
			$this->response(array('status' => "fail", "message"=>"jam mulai harus diisi"));
		} else if (empty($data['jam_selesai'])) {
			$this->response(array('status' => "fail", "message"=>"jam selesai harus diisi"));
		} else{

			$insert= $this->db->insert('pinjam',$data);
			$inser1= $this->db->insert('pinjam_tmp',$data);

			if ($insert){
				$this->response(array('status'=>'success','message' => 'Berhasil Pinjam'));
			}else{
				$this->response(array('status'=>'fail','message' => 'gagal insert'));
			}
		}
	}

function histori_get() {
	$id_user = $this->get('id_user');
	$id_pinjam = $this->get('id_peminjaman');
	$status = $this->get('status');

	if ($status=='booking') {
		$this->db->select('*');
		$this->db->where('id_user', $id_user);
		$this->db->where('status', "booking");
		$this->db->join('ruang', 'ruang.id_ruang = pinjam.id_ruang');
		$user= $this->db->get('pinjam')->result();
		// $this->response(array("status"=>"success","result" => $user));
		if($id_pinjam <> ''){ //byID
			$this->db->select('*');
		$this->db->where('id_user', $id_user);
			$this->db->where('id_peminjaman', $id_pinjam);
			$this->db->join('ruang', 'ruang.id_ruang = pinjam.id_ruang');
			$p= $this->db->get('pinjam')->result();
			$this->response(array("status"=>"success","result" => $p));
		}else {
			$this->response(array("status"=>"success","result" => $user));
		}

	} elseif($status=='dipinjam'){
		$this->db->where('id_user', $id_user);
		$this->db->where('status', "dipinjam");
		$this->db->join('ruang', 'ruang.id_ruang = pinjam.id_ruang');
		$user1= $this->db->get('pinjam')->result();
			if($id_pinjam <> ''){ //byID
				$this->db->where('id_user', $id_user);
				$this->db->where('id_peminjaman', $id_pinjam);
				$this->db->join('ruang', 'ruang.id_ruang = pinjam.id_ruang');
				$p1= $this->db->get('pinjam')->result();
				$this->response(array("status"=>"success","result" => $p1));
			}else {
				$this->response(array("status"=>"success","result" => $user1));
			}
		}else {
			$this->db->where('id_user', $id_user);
			$this->db->join('ruang', 'ruang.id_ruang = pinjam.id_ruang');
			$p3= $this->db->get('pinjam')->result();
			$this->response(array("status"=>"success","result" => $p3));
		}
	}//end his
	

	
	function scanQR_put() {
		$id_pinjam = $this->put('id_pinjam');
		$status = $this->put('status');
		$scanQR = $this->put('idQR');
		
		
		if ($status=='booking') {
			if($id_pinjam <> ''){ //byID

				$pinjam = $this->db->query("
					select * from pinjam 
					where id_peminjaman='".$id_pinjam."' 
					")->row();

				$codeQR = $pinjam->id_peminjaman;
// $this->response(array('status' => "succes", 'result'=>$i));
				if ($scanQR<>'') {
					if ($codeQR == $scanQR ) {
						$data['status'] = "dipinjam";
						$this->db->where('id_peminjaman', $id_pinjam);
						$update = $this->db->update('pinjam', $data);
						$update = $this->db->update('pinjam_tmp', $data);
						$this->response(array('status' => "succes", "message"=>"berhasil pinjam, silakan ambil kunci"));
					} else {
						$this->response(array('status' => "succes", "message"=>"code QR berbeda"));
					}
				} else {
					$this->response(array('status' => "succes", "message"=>"QR kosong"));
				}
				
			}else {
				//$this->response(array('status' => "succes", "message"=>"pinjam kosong"));
				$user= $this->db->get('user')->result();
				
			}
		} else if($status=="dipinjam"){
			$this->db->where('id_peminjaman', $id_pinjam);
			$this->db->join('ruang', 'ruang.id_ruang = pinjam.id_ruang');
			$pinjam= $this->db->get('pinjam')->row();
			$codeQR = $pinjam->id_peminjaman;
			if ($scanQR<>'') {
				if ($codeQR == $scanQR ) {
					$data['status'] = "dikembalikan";
					$this->db->where('id_peminjaman', $id_pinjam);
					$update = $this->db->update('pinjam', $data);
					$this->db->where('id_peminjaman', $id_pinjam);
					$this->db->delete('pinjam_tmp');
					$this->response(array('status' => "succes", "message"=>"berhasil dikembalikan, silakan kembalikan kunci"));
				} else {
					$this->response(array('status' => "succes", "message"=>"Code QR berbeda"));
				}
			} else {
				$this->response(array('status' => "succes", "message"=>"QR kosong"));
			}

		}else {
			$this->response(array("status"=>"failed","message" => "ini siapa?"));
		}
	}//end scanQR


	
} //end class
?>