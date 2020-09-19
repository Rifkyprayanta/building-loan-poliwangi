<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';
class Kelas extends REST_Controller {

	function __construct($config = 'rest') {
		parent::__construct($config);
		$this->load->library('encryption');
	}

	public function index_get()
	{
		$id_kelas = $this->get('id_kelas');
		if ($id_kelas == '') {
			$this->db->select("kelas.*, prodi.*");
			$this->db->from("kelas");
			$this->db->join("prodi", "kelas.id_prodi = prodi.id_prodi");
			$id_kelas = $this->db->get('')->result();
		} else {
			$this->db->where('id_kelas', $id_kelas);
			$id_kelas = $this->db->get('kelas')->result();
		}
		$this->response($id_kelas, 200);
	}

	function index_post() {
		$data = array(
			'nama_kelas'	=> $this->post('nama_kelas'),
			'id_prodi'	=> $this->post('id_prodi'));
		$insert = $this->db->insert('kelas', $data);
		if ($insert) {
			$this->response($data, 200);
		} else {
			$this->response(array('status' => 'fail', 502));
		}
	}

	function index_put() {
        $id_kelas = $this->put('id_kelas');
        $data = array(
                    'id_kelas'       => $id_kelas,
					'nama_kelas'          => $this->put('nama_kelas'),
					'id_prodi'          => $this->put('id_prodi'));
        $this->db->where('id_kelas', $id_kelas);
        $update = $this->db->update('kelas', $data);
        if ($update) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }

    function index_delete() {	
		$id_kelas = $this->delete('id_kelas');
		$this->db->where('id_kelas', $id_kelas);
		$delete = $this->db->delete('kelas');
		if ($delete) {
			$this->response(array('status' => 'success'), 201);
		} else {
			$this->response(array('status' => 'fail', 502));
		}
	}

}

/* End of file kelas.php */
/* Location: ./application/controllers/kelas.php */