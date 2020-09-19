<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';
class Waktu extends REST_Controller {

	function __construct($config = 'rest') {
		parent::__construct($config);
		$this->load->library('encryption');
	}

	public function index_get()
	{
		$id_waktu = $this->get('id_waktu');
		if ($id_waktu == '') {
			$id_waktu = $this->db->get('waktu')->result();
		} else {
			$this->db->where('id_waktu', $id_waktu);
			$id_waktu = $this->db->get('waktu')->result();
		}
		$this->response($id_waktu, 200);
	}

	function index_post() {
		$data = array(
			//'id_waktu'	=> $this->post('id_waktu'),
			'hari'	=> $this->post('hari'),
			'jamke'	=> $this->post('jamke'),
			'jam_mulai'	=> $this->post('jam_mulai'),
			'jam_selesai'	=> $this->post('jam_selesai'));
		$insert = $this->db->insert('waktu', $data);
		if ($insert) {
			$this->response($data, 200);
		} else {
			$this->response(array('status' => 'fail', 502));
		}
	}

	function index_put() {
        $id_waktu = $this->put('id_waktu');
        $data = array(
                    'id_waktu'       => $id_waktu,
					'hari'          => $this->put('hari'),
					'jamke'	=> $this->put('jamke'),
					'jam_mulai'	=> $this->put('jam_mulai'),
					'jam_selesai'	=> $this->put('jam_selesai'));
        $this->db->where('id_waktu', $id_waktu);
        $update = $this->db->update('waktu', $data);
        if ($update) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }

    function index_delete() {	
		$id_waktu = $this->delete('id_waktu');
		$this->db->where('id_waktu', $id_waktu);
		$delete = $this->db->delete('waktu');
		if ($delete) {
			$this->response(array('status' => 'success'), 201);
		} else {
			$this->response(array('status' => 'fail', 502));
		}
	}

}

/* End of file waktu.php */
/* Location: ./application/controllers/waktu.php */