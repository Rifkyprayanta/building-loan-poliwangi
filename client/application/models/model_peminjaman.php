<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_peminjaman extends CI_Model {

    //model peminjaman ini digunakan untuk menampilkan jadwal peminjaman ke dalam website. Model ini dipanggil dari controller peminjaman. dan berisikan function simpan_peminjaman() yang didalamnya berisi query untuk menyimpan jadwal peminjaman ruangan. 
	function simpan_peminjaman($id_peminjaman, $id_ruang,$id_user,$jam_mulai,$jam_selesai, $tgl_pinjam, $status){
        $data = array(
            'id_peminjaman'       => $id_peminjaman,
            'id_ruang'       => $id_ruang,
            'id_user'      => $id_user,
            'jam_mulai'     => $jam_mulai,
            'jam_selesai'     => $jam_selesai, 
            'tgl_pinjam'     => $tgl_pinjam,
            'status'     => $status
        );
        $this->db->insert('pinjam',$data);
    }

    function simpan_qr($id_peminjaman, $image_name){
        $data = array(
            'qr_code'   => $image_name
        );
        $this->db->where('id_peminjaman', $id_peminjaman);
        $this->db->update('pinjam',$data);
    }

	

}

/* End of file model_peminjaman.php */
/* Location: ./application/models/model_peminjaman.php */