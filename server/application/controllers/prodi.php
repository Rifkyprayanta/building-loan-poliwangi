<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';
class Prodi extends REST_Controller {

	function __construct($config = 'rest') {
		parent::__construct($config);
		$this->load->library('encryption');
	}

	public function index_get()
	{
		$id_prodi = $this->get('id_prodi');
		if ($id_prodi == '') {
			$this->db->select("prodi.*, jurusan.*");
			$this->db->from("prodi");
			$this->db->join("jurusan", "prodi.id_jurusan = jurusan.id_jurusan");
			$id_prodi = $this->db->get('')->result();
		} else {
			$this->db->where('id_prodi', $id_prodi);
			$id_prodi = $this->db->get('prodi')->result();
		}
		$this->response($id_prodi, 200);
	}

	function index_post() {
		$data = array(
			'id_prodi'	=> $this->post('id_prodi'),
			'nama_prodi'	=> $this->post('nama_prodi'),
			'id_jurusan'	=> $this->post('id_jurusan'));
		$insert = $this->db->insert('prodi', $data);
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
        $update = $this->db->update('prodi', $data);
        if ($update) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }

    function index_delete() {	
		$id_prodi = $this->delete('id_prodi');
		$this->db->where('id_prodi', $id_prodi);
		$delete = $this->db->delete('prodi');
		if ($delete) {
			$this->response(array('status' => 'success'), 201);
		} else {
			$this->response(array('status' => 'fail', 502));
		}
	}

}

/* End of file prodi.php */
/* Location: ./application/controllers/prodi.php */