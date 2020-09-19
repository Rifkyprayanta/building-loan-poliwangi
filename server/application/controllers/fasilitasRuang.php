<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';
class fasilitasRuang extends REST_Controller {

	function __construct($config = 'rest') {
		parent::__construct($config);
		$this->load->library('encryption');
	}

	public function index_get()
	{
		$id_fasilitasruang = $this->get('id_fasilitasruang');
		if ($id_fasilitasruang == '') {
			$this->db->select("fasilitasruang.*, fasilitas.*, ruang.*");
			$this->db->from("fasilitasruang");
			$this->db->join("fasilitas", "fasilitasruang.id_fasilitas = fasilitas.id_fasilitas");
			$this->db->join("ruang", "fasilitasruang.id_ruang = ruang.id_ruang");
			$id_fasilitasruang = $this->db->get('')->result();
		} else {
			$this->db->where('id_fasilitasruang', $id_fasilitasruang);
			$id_fasilitasruang = $this->db->get('fasilitasruang')->result();
		}
		$this->response($id_fasilitasruang, 200);
	}

	public function lihatrusak_get()
	{
		$id_fasilitasruang = $this->get('id_fasilitasruang');
		if ($id_fasilitasruang == '') {
			$this->db->select("fasilitasruang.*, fasilitas.*, ruang.*");
			$this->db->from("fasilitasruang");
			$this->db->join("fasilitas", "fasilitasruang.id_fasilitas = fasilitas.id_fasilitas");
			$this->db->join("ruang", "fasilitasruang.id_ruang = ruang.id_ruang");
			$id_fasilitasruang = $this->db->get('')->result();
		} else {
			$this->db->select("fasilitasruang.*, fasilitas.*, ruang.*");
			$this->db->from("fasilitasruang");
			$this->db->join("fasilitas", "fasilitasruang.id_fasilitas = fasilitas.id_fasilitas");
			$this->db->join("ruang", "fasilitasruang.id_ruang = ruang.id_ruang");
			$this->db->where('id_fasilitasruang', $id_fasilitasruang);
			$id_fasilitasruang = $this->db->get('')->result();
		}
		$this->response($id_fasilitasruang, 200);
	}

	function index_post() {
		$data = array(
			'id_fasilitasruang'	=> $this->post('id_fasilitasruang'),
			'id_fasilitas'	=> $this->post('id_fasilitas'),
			'jml'	=> $this->post('jml'),
			'id_ruang'	=> $this->post('id_ruang'));
		$insert = $this->db->insert('fasilitasruang', $data);
		if ($insert) {
			$this->response($data, 200);
		} else {
			$this->response(array('status' => 'fail', 502));
		}
	}

	function index_put() {
        $id_fasilitasruang = $this->put('id_fasilitasruang');
        $data = array(
                    'id_fasilitasruang'       => $id_fasilitasruang,
                    'id_fasilitas'          => $this->put('id_fasilitas'),
					'jml'          => $this->put('jml'),
					'id_ruang'          => $this->put('id_ruang'));
        $this->db->where('id_fasilitasruang', $id_fasilitasruang);
        $update = $this->db->update('fasilitasruang', $data);
        if ($update) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }

    function index_delete() {	
		$id_fasilitasruang = $this->delete('id_fasilitasruang');
		$this->db->where('id_fasilitasruang', $id_fasilitasruang);
		$delete = $this->db->delete('fasilitasruang');
		if ($delete) {
			$this->response(array('status' => 'success'), 201);
		} else {
			$this->response(array('status' => 'fail', 502));
		}
	}

}

/* End of file fasilitas.php */
/* Location: ./application/controllers/fasilitas.php */