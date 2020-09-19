<?php
require APPPATH . '/libraries/REST_Controller.php';

class User extends REST_Controller {

	function index_get() {
		$id_user = $this->get('id_user');
		if($id_user <> ''){ //byID
			$this->db->where('id_user', $id_user);
			
			$this->db->join('kelas', 'kelas.id_kelas = user.id_kelas');
			$this->db->join('prodi', 'prodi.id_prodi = kelas.id_prodi');
			$user= $this->db->get('user')->result();
			$this->response(array("status"=>"success","result" => $user));
		}
		else {
			$user= $this->db->get('user')->result();
			$this->response(array("status"=>"success","result" => $user));
		}
	}
	

	// login
	function login_post() {
		$data['username'] = $this->post('username');
		$data['password'] = $this->post('password');
		
		if (empty($data['username'])) {
			$this->response(array('status' => "fail", "message"=>"username harus diisi"));
		} else if (empty($data['password'])) {
			$this->response(array('status' => "fail", "message"=>"Password harus diisi"));
		} else{
			$username = $data['username'];
			$password = $data['password'];
			$cek_login = "SELECT * FROM user WHERE username=? AND password=?";
			$cek_email = $this->db->query($cek_login,$username,$password);
			$result_login = $cek_email->row();
			if ($this->db->affected_rows()==1) {
				$pass = $result_login->password;
				if ($password == $pass) {
				    $idU=$result_login->id_user;
				
				$cek_data = $this->db->query("
				SELECT * FROM user WHERE id_user='".$idU."'
				")->result();
				$this->response(array('status' => "success", 'result'=>$cek_data));	
				} else {
					//password salah
					$this->response(array('status' => "fail", "message"=>"Password Salah"));
				}
			} else {
				$this->response(array('status' => "fail", "message"=>"Email Belum Terdaftar"));
			}
		}	
	}//end login
	function jadwalbyUser_get(){
		$id_user = $this->get('id_user');
		if ($id_user == '') {
		    $this->db->select('*');
			$this->db->join('jadwal', 'jadwal.id_kelas = user.id_kelas');
				$this->db->join('waktu', 'waktu.id_waktu = jadwal.id_waktu');
			$this->db->join('kelas', 'kelas.id_kelas = jadwal.id_kelas');
			$j = $this->db->get('user')->result();
		} else {
		$this->db->select('*');
			$this->db->join('jadwal', 'jadwal.id_kelas = user.id_kelas');
				$this->db->join('waktu', 'waktu.id_waktu = jadwal.id_waktu');
			$this->db->join('kelas', 'kelas.id_kelas = jadwal.id_kelas');
			$this->db->join('matakuliah', 'matakuliah.id_matakuliah = jadwal.id_matakuliah');
			$this->db->where('id_user', $id_user);
			$j = $this->db->get('user')->result();
		}
		$this->response(array("status"=>"success","result" => $j));
	}
}//end user


/* End of file user.php */
/* Location: ./application/controllers/user.php */
?>
