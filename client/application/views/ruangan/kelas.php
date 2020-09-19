   <!-- button untuk menambah data kelas -->
   <a href="<?php echo base_url('ruangan/tambah_kelas/')?>" class="btn btn-success">Tambah Kelas</a>
    <br>
    <br>
<!-- untuk menampilkan data kelas dalam bentuk tabel -->
    <table id="tabel" class="table table-stripped table-bordered" style="width:100%">
      <thead>
        <tr>
        <th>No</th>
        <th>Nama Kelas</th>
        <th>Nama Prodi</th>
        <th>Aksi</th>
      </tr>
      </thead>
      <tbody>
        <!-- memanggil data dari controller ruangan function kelas dengan var. kelas -->
        <?php $no=1; foreach($kelas as $a)
          { ?>
        <tr>
          <td><?php echo $no  ?></td>
          <td><?php echo $a->nama_kelas; ?></td>
          <td><?php echo $a->nama_prodi; ?></td>
          <td><a href="<?php echo base_url('ruangan/edit_kelas/'.$a->id_kelas);?>" class="btn btn-success">Edit</a>&nbsp<a href="<?php echo base_url('ruangan/delete_kelas/'.$a->id_kelas);?>" onclick="return confirm('Ingin menghapus data?');" class="btn btn-danger">Delete</a></td> 
        </tr>
        <?php $no++;
        } 
        ?>
      </tbody>
    </table>