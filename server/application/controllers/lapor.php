<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';
class Lapor extends REST_Controller {

	function __construct($config = 'rest') {
		parent::__construct($config);
	}

	public function lapor_get()
	{
		$id_fasilitasruang = $this->get('id_fasilitasruang');
		if ($id_fasilitasruang == '') {
			$this->db->select("user.id_user, user.nama, fasilitasruang.id_fasilitasruang, fasilitasruang.id_fasilitas, fasilitas.id_fasilitas, fasilitas.nama_fasilitas, lapor.id_lapor, lapor.laporan, lapor.foto, lapor.status");
			$this->db->from("lapor");
			$this->db->join("user", "lapor.id_user = user.id_user");
			$this->db->join("fasilitasruang", "lapor.id_fasilitasruang = fasilitasruang.id_fasilitasruang");
			$this->db->join("fasilitas", "fasilitasruang.id_fasilitas = fasilitas.id_fasilitas");
			$id_fasilitasruang = $this->db->get('')->result();
		} else {
			$this->db->select("user.id_user, user.nama, fasilitasruang.id_fasilitasruang, fasilitasruang.id_fasilitas, fasilitas.id_fasilitas, fasilitas.nama_fasilitas, lapor.id_lapor, lapor.laporan, lapor.foto, lapor.status");
			$this->db->from("lapor");
			$this->db->join("user", "lapor.id_user = user.id_user");
			$this->db->join("fasilitasruang", "lapor.id_fasilitasruang = fasilitasruang.id_fasilitasruang");
			$this->db->join("fasilitas", "fasilitasruang.id_fasilitas = fasilitas.id_fasilitas");
			$this->db->where('lapor.id_fasilitasruang', $id_fasilitasruang);
			$id_fasilitasruang = $this->db->get('')->result();
		}
		$this->response($id_fasilitasruang, 200);
	}

	public function lapordetail_get()
	{
		$id_lapor = $this->get('id_lapor');
		if ($id_lapor == '') {
			$this->db->select("user.id_user, user.nama, fasilitasruang.id_fasilitasruang, fasilitasruang.id_fasilitas, fasilitas.id_fasilitas, fasilitas.nama_fasilitas, lapor.id_lapor, lapor.laporan, lapor.foto, lapor.status");
			$this->db->from("lapor");
			$this->db->join("user", "lapor.id_user = user.id_user");
			$this->db->join("fasilitasruang", "lapor.id_fasilitasruang = fasilitasruang.id_fasilitasruang");
			$this->db->join("fasilitas", "fasilitasruang.id_fasilitas = fasilitas.id_fasilitas");
			$id_lapor = $this->db->get('')->result();
		} else {
			$this->db->select("user.id_user, user.nama, fasilitasruang.id_fasilitasruang, fasilitasruang.id_fasilitas, fasilitas.id_fasilitas, fasilitas.nama_fasilitas, lapor.id_lapor, lapor.laporan, lapor.foto, lapor.status");
			$this->db->from("lapor");
			$this->db->join("user", "lapor.id_user = user.id_user");
			$this->db->join("fasilitasruang", "lapor.id_fasilitasruang = fasilitasruang.id_fasilitasruang");
			$this->db->join("fasilitas", "fasilitasruang.id_fasilitas = fasilitas.id_fasilitas");
			$this->db->where('lapor.id_lapor', $id_lapor);
			$id_lapor = $this->db->get('')->result();
		}
		$this->response($id_lapor, 200);
	}

	function laporan_post() {
			$data['id_user'] = $this->post('id_user');
			$data['id_ruang'] = $this->post('id_ruang');
			$data['laporan'] = $this->post('laporan');
			$data['foto'] = $this->post('foto');
			
			//Validasi input data
			if (empty($data['id_user'])) {
				$this->response(array('status' => "fail", "message"=>"email harus diisi"));
			} else if (empty($data['id_ruang'])) {
				$this->response(array('status' => "fail", "message"=>"Password harus diisi"));
			} else if (empty($data['laporan'])) {
				$this->response(array('status' => "fail", "message"=>" silakan isi laporan anda !"));
			}else {
				$this->insert_guru($data);
			}
	}//end index_post
	
	function insert_guru($data){
		//function upload image
		$uploaddir = str_replace("application/", "", APPPATH).'upload/fotolaporan/';
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
			$data['foto'] = "upload/".$user_img;
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

	function index_put() {
        $id_lapor = $this->put('id_lapor');
        $data = array(
                    'id_lapor'       => $id_lapor,
                    'status'    => $this->put('status'));
        $this->db->where('id_lapor', $id_lapor);
        $update = $this->db->update('lapor', $data);
        if ($update) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }

}

/* End of file lapor.php */
/* Location: ./application/controllers/lapor.php */