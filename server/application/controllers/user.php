<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';
class User extends REST_Controller {

	function __construct($config = 'rest') {
		parent::__construct($config);
		$this->load->library('encryption');
	}

	public function index_get()
	{
		$id_user = $this->get('id_user');
		if ($id_user == '') {
			$this->db->select("user.*");
			$this->db->from("user");
			$this->db->order_by("id_user", "DESC");
			$id_user = $this->db->get('')->result();
		} else {
			$this->db->select("user.*, kelas.*");
			$this->db->from("user");
			$this->db->join("kelas", "user.id_kelas = kelas.id_kelas");
			$this->db->where('id_user', $id_user);
			$this->db->order_by("id_user", "DESC");
			$id_user = $this->db->get('')->result();
		}
		$this->response($id_user, 200);
	}

	function index_post() {
		$data = array(
			'id_user'	=> $this->post('id_user'),
			'nama'	=> $this->post('nama'),
			'username'	=> $this->post('username'),
			'password'	=> $this->post('password'),
			'foto'	=> $this->post('foto'),
			'level'	=> $this->post('level'),
			'id_kelas'	=> $this->post('id_kelas'),
		);
		$insert = $this->db->insert('user', $data);
		if ($insert) {
			$this->response($data, 200);
		} else {
			$this->response(array('status' => 'fail', 502));
		}
	}

	function index_put() {
        $id_user = $this->put('id_user');
        $data = array(
                    'id_user'       => $id_user,
                    'nama'          => $this->put('nama'),
                    'username'          => $this->put('username'),
                    'password'          => $this->put('password'),
                    'level'    => $this->put('level'),
                	'id_kelas'	=> $this->post('id_kelas'));
        $this->db->where('id_user', $id_user);
        $update = $this->db->update('user', $data);
        if ($update) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }

    function index_delete() {	
		$id_user = $this->delete('id_user');
		$this->db->where('id_user', $id_user);
		$delete = $this->db->delete('user');
		if ($delete) {
			$this->response(array('status' => 'success'), 201);
		} else {
			$this->response(array('status' => 'fail', 502));
		}
	}

}

/* End of file user.php */
/* Location: ./application/controllers/user.php */