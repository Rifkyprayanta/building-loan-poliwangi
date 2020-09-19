<?php
require APPPATH . '/libraries/REST_Controller.php';

class Lapor extends REST_Controller{

	function lokasi_get() {
		$id_ruang = $this->get('id_ruang');
		if ($id_ruang == '') {
			$lantai = $this->db->get('ruang')->result();
		} else {
		    $this->db->join('lantai', 'lantai.id_lantai = ruang.id_lantai');
		    $this->db->join('gedung', 'gedung.id_gedung = lantai.id_gedung');
			$this->db->where('id_ruang', $id_ruang);
			$lantai = $this->db->get('ruang')->result();
		}
		$this->response(array("status"=>"success","result" => $lantai));
	}

function laporan_post() {
			$data['id_user'] = $this->post('id_user');
			$data['id_fasilitasruang'] = $this->post('id_fasilitasruang');
			$data['laporan'] = $this->post('laporan');
			$data['foto'] = $this->post('foto');
			
			//Validasi input data
			if (empty($data['id_user'])) {
				$this->response(array('status' => "fail", "message"=>"email harus diisi"));
			} else if (empty($data['id_fasilitasruang'])) {
				$this->response(array('status' => "fail", "message"=>"Password harus diisi"));
			} else if (empty($data['laporan'])) {
				$this->response(array('status' => "fail", "message"=>" silakan isi laporan anda !"));
			}else {
				$this->insert_guru($data);
			}
	}//end index_post
	
	function insert_guru($data){
		//function upload image
		$uploaddir = str_replace("","",APPPATH).'../upload/fotolaporan/';
		if(!file_exists($uploaddir) && !is_dir($uploaddir)) {
			echo mkdir($uploaddir, 0755, true);
		}
		if (!empty($_FILES)){
			$path = $_FILES['foto']['name'];
			$ext = pathinfo($path, PATHINFO_EXTENSION);
			$randomCode = str_pad(rand(0, pow(10, 4)-1), 4, '0', STR_PAD_LEFT);
			$namafoto = $data['id_user'].$randomCode;
			$user_img = $namafoto. '.' . "png";
			$uploadfile = $uploaddir . $user_img;
			$data['foto'] = "upload/fotolaporan/".$user_img;
		}else{
// 			$data['foto']="";
$this->response(array('status' => "fail", "message"=>"wajib isi foto"));
		}

// 		$get_guru_baseid = $this->db->query("SELECT * FROM lapor as p WHERE
// 			p.id_lapor='".$data['id_user']."'")->result();
// 		if(empty($get_guru_baseid)){
			$insert= $this->db->insert('lapor',$data);
			if (!empty($_FILES)){
				if ($_FILES["foto"]["name"]) {
					if
						(move_uploaded_file($_FILES["foto"]["tmp_name"],$uploadfile))
					{
						$insert_image = "success";
					} else{
						$insert_image = "failed";
					}
				}else{
					$insert_image = "Image Tidak ada Masukan";
				}
				$data['foto'] = base_url()."upload/".$user_img;
			}else{
				$data['foto'] = "";
			}
			if ($insert){
				$this->response(array('status'=>'success','message' => 'Berhasil Lapor !'));
			}
// 		}else{
// 			$this->response(array('status' => "failed", "message"=>"Id_guru
// 				sudah ada"));
// 		}	
	} //end insert guru



	
}
?>