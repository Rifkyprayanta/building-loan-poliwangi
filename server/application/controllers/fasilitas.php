<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';
class Fasilitas extends REST_Controller {

	function __construct($config = 'rest') {
		parent::__construct($config);
		$this->load->library('encryption');
	}

	public function index_get()
	{
		$id_fasilitas = $this->get('id_fasilitas');
		if ($id_fasilitas == '') {
			$id_fasilitas = $this->db->get('fasilitas')->result();
		} else {
			$this->db->where('id_fasilitas', $id_fasilitas);
			$id_fasilitas = $this->db->get('fasilitas')->result();
		}
		$this->response($id_fasilitas, 200);
	}

	function index_post() {
		$data = array(
			'id_fasilitas'	=> $this->post('id_fasilitas'),
			'nama_fasilitas'	=> $this->post('nama_fasilitas'));
		$insert = $this->db->insert('fasilitas', $data);
		if ($insert) {
			$this->response($data, 200);
		} else {
			$this->response(array('status' => 'fail', 502));
		}
	}

	function index_put() {
        $id_fasilitas = $this->put('id_fasilitas');
        $data = array(
                    'id_fasilitas'       => $id_fasilitas,
					'nama_fasilitas'          => $this->put('nama_fasilitas'));
        $this->db->where('id_fasilitas', $id_fasilitas);
        $update = $this->db->update('fasilitas', $data);
        if ($update) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }

    function index_delete() {	
		$id_fasilitas = $this->delete('id_fasilitas');
		$this->db->where('id_fasilitas', $id_fasilitas);
		$delete = $this->db->delete('fasilitas');
		if ($delete) {
			$this->response(array('status' => 'success'), 201);
		} else {
			$this->response(array('status' => 'fail', 502));
		}
	}

}

/* End of file fasilitas.php */
/* Location: ./application/controllers/fasilitas.php */