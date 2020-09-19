   <!-- button untuk menambah data prodi -->
   <a href="<?php echo base_url('ruangan/tambah_prodi/')?>" class="btn btn-success">Tambah Prodi</a>
    <br>
    <br>
  <!-- untuk menampilkan data prodi dalam bentuk tabel -->
    <table id="tabel" class="table table-stripped table-bordered" style="width:100%">
      <thead>
        <tr>
        <th>No</th>
        <th>Nama Ruang</th>
        <th>Kelas</th>
        <th>Hari</th>
        <th>Waktu</th>
        <th>Status</th>
        <th>Aksi</th>
      </tr>
      </thead>
      <tbody>
        <!-- memanggil data dari controller ruangan function ruangan dengan var. ruang -->
        <?php $no=1; foreach($ruang as $a)
          { 
            if($a->id_status == 1)
              $simpan = "terpakai";
            elseif ($a->id_status == 2) 
              $simpan = "kosong";
            elseif ($a->id_status == 3) 
              $simpan = "terjadwal";
            elseif ($a->id_status == 4) 
                $simpan = "tidak layak";
            ?>
            }
        <tr>
          <td><?php echo $no  ?></td>
          <td><?php echo $a->nama_ruang; ?></td>
          <td><?php echo $a->nama_kelas; ?></td>
          <td><?php echo $a->hari; ?></td>
          <td><?php echo $a->jam_mulai; ?> - <?php echo $a->jam_selesai; ?></td>
          <td><?php echo $simpan; ?></td>
          <td><a href="<?php echo base_url('ruang/edit/'.$a->id_ruang);?>" class="btn btn-success">Edit</a>&nbsp<a href="<?php echo base_url('ruang/delete/'.$a->id_ruang);?>" onclick="return confirm('Ingin menghapus data?');" class="btn btn-danger">Delete</a></td> 
        </tr>
        <?php $no++;
        } 
        ?>
      </tbody>
    </table>