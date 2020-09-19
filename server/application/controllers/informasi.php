<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';
class Informasi extends REST_Controller {

	function __construct($config = 'rest') {
		parent::__construct($config);
	}

	public function index_get()
	{
		$id_berita = $this->get('id_berita');
		if ($id_berita == '') {
			$this->db->select("berita.*, date_format(berita.tanggal, '%d %M %Y') as tanggalan");
			$this->db->from("berita");
			$id_berita = $this->db->get('')->result();
		} else {
			$this->db->where('id_berita', $id_berita);
			$id_berita = $this->db->get('berita')->result();
		}
		$this->response($id_berita, 200);
	}

	function index_post() {
		$data = array(
			'id_berita'	=> $this->post('id_berita'),
			'judul_acara'	=> $this->post('judul_acara'),
			'tanggal'	=> $this->post('tanggal'),
			'foto'	=> $this->post('foto'));
		$insert = $this->db->insert('berita', $data);
		if ($insert) {
			$this->response($data, 200);
		} else {
			$this->response(array('status' => 'fail', 502));
		}
	}

	function index_put() {
        $id_berita = $this->put('id_berita');
        $data = array(
                    'id_berita'       => $id_berita,
					'id_ruang'     => $this->put('id_ruang'),
					'id_kelas'       => $this->put('id_kelas'),
					'id_waktu'       => $this->put('id_waktu'));
        $this->db->where('id_jadwal', $id_jadwal);
        $update = $this->db->update('berita', $data);
        if ($update) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }

    function index_delete() {	
		$id_berita = $this->delete('id_berita');
		$this->db->where('id_berita', $id_berita);
		$delete = $this->db->delete('berita');
		if ($delete) {
			$this->response(array('status' => 'success'), 201);
		} else {
			$this->response(array('status' => 'fail', 502));
		}
	}

}

/* End of file informasi.php */
/* Location: ./application/controllers/informasi.php */