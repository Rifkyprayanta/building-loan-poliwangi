    <!-- button untuk menambah data waktu -->
    <a href="<?php echo base_url('ruangan/tambah_waktu/')?>" class="btn btn-success">Tambah Waktu</a>
    <br>
    <br>
    <!-- untuk menampilkan data waktu dalam bentuk tabel -->
    <table id="tabel" class="table table-stripped table-bordered" style="width:100%">
      <thead>
        <tr>
        <th>No</th>
        <th>Hari</th>
        <th>Jam Ke</th>
        <th>Jam Mulai</th>
        <th>Jam Selesai</th>
        <th>Aksi</th>
      </tr>
      </thead>
      <tbody>
        <!-- memanggil data dari controller ruangan function waktu dengan var. waktu -->
        <?php $no=1; foreach($waktu as $a)
          { ?>
        <tr>
          <td><?php echo $no  ?></td>
          <td><?php echo $a->hari; ?></td>
          <td><?php echo $a->jamke; ?></td>
          <td><?php echo $a->jam_mulai; ?></td>
          <td><?php echo $a->jam_selesai; ?></td>
          <td><a href="<?php echo base_url('ruangan/edit_waktu/'.$a->id_waktu);?>" class="btn btn-success">Edit</a>&nbsp<a href="<?php echo base_url('ruangan/delete_waktu/'.$a->id_waktu);?>" onclick="return confirm('Ingin menghapus data?');" class="btn btn-danger">Delete</a></td> 
        </tr>
        <?php $no++;
        } 
        ?>
      </tbody>
    </table>