<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';
class Lantai extends REST_Controller {

	function __construct($config = 'rest') {
		parent::__construct($config);
		$this->load->library('encryption');
	}

	public function index_get()
	{
		$id_lantai = $this->get('id_lantai');
		if ($id_lantai == '') {
			$this->db->select("lantai.*, gedung.*");
			$this->db->from("lantai");
			$this->db->join("gedung", "lantai.id_gedung = gedung.id_gedung");
			$id_lantai = $this->db->get('')->result();
		} else {
			$this->db->where('id_lantai', $id_lantai);
			$id_lantai = $this->db->get('lantai')->result();
		}
		$this->response($id_lantai, 200);
	}

	function index_post() {
		$data = array(
			'id_prodi'	=> $this->post('id_prodi'),
			'nama_prodi'	=> $this->post('nama_prodi'),
			'id_jurusan'	=> $this->post('id_jurusan'));
		$insert = $this->db->insert('lantai', $data);
		if ($insert) {
			$this->response($data, 200);
		} else {
			$this->response(array('status' => 'fail', 502));
		}
	}

	function index_put() {
        $id_prodi = $this->put('id_prodi');
        $data = array(
                    'id_prodi'       => $id_prodi,
					'nama_prodi'          => $this->put('nama_prodi'),
					'id_jurusan'          => $this->put('id_jurusan'));
        $this->db->where('id_prodi', $id_prodi);
        $update = $this->db->update('lantai', $data);
        if ($update) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }

    function index_delete() {	
		$id_prodi = $this->delete('id_prodi');
		$this->db->where('id_prodi', $id_prodi);
		$delete = $this->db->delete('lantai');
		if ($delete) {
			$this->response(array('status' => 'success'), 201);
		} else {
			$this->response(array('status' => 'fail', 502));
		}
	}

}

/* End of file lantai.php */
/* Location: ./application/controllers/lantai.php */