   <!-- button untuk menuju form tambah peminjaman -->
    <a href="<?php echo base_url('peminjaman/tambah_peminjaman/')?>" class="btn btn-success">Tambah Peminjaman</a>
    <br>
    <br>
    <?php echo $this->session->set_flashdata('hasil'); ?>
    <!-- untuk menampilkan data peminjaman dalam bentuk tabel -->
    <table id="tabel" class="table table-stripped table-bordered" style="width:100%">
      <thead>
        <tr>
        <th>No</th>
        <th>Ruangan</th>
        <th>Nama Peminjam</th>
        <th>Waktu</th>
        <th>Tanggal Pinjam</th>
        <th>Status</th>
        <th>Aksi</th>
      </tr>
      </thead>
      <tbody>
        <!-- memanggil data dari controller dengan var. informasi -->
        <?php $no=1; foreach($peminjaman as $a)
          { ?>
        <tr>
          <td><?php echo $no  ?></td>
          <td><?php echo $a->nama_ruang; ?></td>
          <td><?php echo $a->nama; ?></td>
          <td><?php echo $a->mulai; ?> - <?php echo $a->selesai; ?></td>
          <td><?php echo $a->tanggal; ?></td>
          <td><?php echo $a->status; ?></td>
          <td><a href="<?php echo base_url('peminjaman/hapus_peminjaman/'.$a->id_peminjaman);?>" onclick="return confirm('Ingin menghapus data?');" class="btn btn-danger">Delete</a>&nbsp<a href="<?php echo base_url('peminjaman/edit_peminjaman/'.$a->id_peminjaman);?>" class="btn btn-warning">Pinjam</a>&nbsp<a href="<?php echo base_url('peminjaman/edit_peminjaman/'.$a->id_peminjaman);?>" class="btn btn-success">Kembali</a></td> 
        </tr>
        <?php $no++;
        } 
        ?>
      </tbody>
      <tfoot>
            <tr>
                <th>No</th>
                 <th>Ruangan</th>
                <th>Nama Peminjam</th>
                <th>Waktu</th>
                <th>Tanggal Pinjam</th>
                <th>Status</th>
            </tr>
        </tfoot>
    </table>