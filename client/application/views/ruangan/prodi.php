    <!-- button untuk menambah data prodi -->
    <a href="<?php echo base_url('ruangan/tambah_prodi/')?>" class="btn btn-success">Tambah Prodi</a>
    <br>
    <br>
    <!-- untuk menampilkan data prodi dalam bentuk tabel -->
    <table id="tabel" class="table table-stripped table-bordered" style="width:100%">
      <thead>
        <tr>
        <th>No</th>
        <th>Nama Program Studi</th>
        <th>Nama Jurusan</th>
        <th>Aksi</th>
      </tr>
      </thead>
      <tbody>
        <!-- memanggil data dari controller ruangan function prodi dengan var. prodi -->
        <?php $no=1; foreach($prodi as $a)
          { ?>
        <tr>
          <td><?php echo $no  ?></td>
          <td><?php echo $a->nama_prodi; ?></td>
          <td><?php echo $a->nama_jurusan; ?></td>
          <td><a href="<?php echo base_url('ruangan/edit_prodi/'.$a->id_prodi);?>" class="btn btn-success">Edit</a>&nbsp<a href="<?php echo base_url('ruangan/delete_prodi/'.$a->id_prodi);?>" onclick="return confirm('Ingin menghapus data?');" class="btn btn-danger">Delete</a></td> 
        </tr>
        <?php $no++;
        } 
        ?>
      </tbody>
    </table>