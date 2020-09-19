    <!-- button untuk menambah data ruangan -->
    <a href="<?php echo base_url('ruangan/tambah_ruangan/')?>" class="btn btn-success">Tambah Ruangan</a>
    <br>
    <br>
    <!-- untuk menampilkan data ruangan dalam bentuk tabel -->
    <table id="tabel" class="table table-stripped table-bordered" style="width:100%">
      <thead>
        <tr>
        <th>No</th>
        <th>Nama Ruangan</th>
        <th>Lantai</th>
        <th>Gedung</th>
        <th>Status Ruang</th>
        <th>Aksi</th>
      </tr>
      </thead>
      <tbody>
        <!-- memanggil data dari controller ruangan function ruangan dengan var. ruangan -->
        <?php $no=1; foreach($ruangan as $a)
          { ?>
        <tr>
          <td><?php echo $no  ?></td>
          <td><?php echo $a->nama_ruang; ?></td>
          <td><?php echo $a->nama_lantai; ?></td>
          <td><?php echo $a->nama_gedung; ?></td>
          <td><?php echo $a->status_ruang; ?></td>
          <td><a href="<?php echo base_url('ruangan/edit_ruangan/'.$a->id_ruang);?>" class="btn btn-success">Edit</a>&nbsp<a href="<?php echo base_url('ruangan/delete_ruangan/'.$a->id_ruang);?>" onclick="return confirm('Ingin menghapus data?');" class="btn btn-danger">Delete</a>
        </tr>
        <?php $no++;
        } 
        ?>
      </tbody>
    </table>