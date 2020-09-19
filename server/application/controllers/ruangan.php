<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';
class Ruangan extends REST_Controller {

	function __construct($config = 'rest') {
		parent::__construct($config);
		$this->load->library('encryption');
	}

	public function index_get()
	{
		$id_ruang = $this->get('id_ruang');
		if ($id_ruang == '') {
			$this->db->select("ruang.*, lantai.*, gedung.*");
			$this->db->from("ruang");
			$this->db->join("lantai", "ruang.id_lantai = lantai.id_lantai");
			$this->db->join("gedung", "lantai.id_gedung = gedung.id_gedung");
			$id_ruang = $this->db->get('')->result();
		} else {
			$this->db->select("ruang.*, lantai.*, gedung.*");
			$this->db->from("ruang");
			$this->db->join("lantai", "ruang.id_lantai = lantai.id_lantai");
			$this->db->join("gedung", "lantai.id_gedung = gedung.id_gedung");
			$this->db->where('id_ruang', $id_ruang);
			$id_ruang = $this->db->get('')->result();
		}
		$this->response($id_ruang, 200);
	}

	function index_post() {
		$data = array(
			'id_ruang'	=> $this->post('id_ruang'),
			'nama_ruang'	=> $this->post('nama_ruang'),
			'id_lantai'	=> $this->post('id_lantai'),
			'status_ruang'	=> $this->post('status_ruang'));
		$insert = $this->db->insert('ruang', $data);
		if ($insert) {
			$this->response($data, 200);
		} else {
			$this->response(array('status' => 'fail', 502));
		}
	}

	function index_put() {
        $id_ruang = $this->put('id_ruang');
        $data = array(
                    'id_ruang'       => $id_ruang,
					'nama_ruang'          => $this->put('nama_ruang'),
					'id_lantai'          => $this->put('id_lantai'),
					'status_ruang'	=> $this->put('status_ruang'));
        $this->db->where('id_ruang', $id_ruang);
        $update = $this->db->update('ruang', $data);
        if ($update) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }

    function index_delete() {	
		$id_ruang = $this->delete('id_ruang');
		$this->db->where('id_ruang', $id_ruang);
		$delete = $this->db->delete('ruang');
		if ($delete) {
			$this->response(array('status' => 'success'), 201);
		} else {
			$this->response(array('status' => 'fail', 502));
		}
	}

}

/* End of file ruangan.php */
/* Location: ./application/controllers/ruangan.php */