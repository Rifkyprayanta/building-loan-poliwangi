<!-- button untuk menambah mata kuliah -->
<a href="<?php echo base_url('mata_kuliah/tambah_matkul/')?>" class="btn btn-success">Tambah Mata Kuliah</a>
    <br>
    <br>
    <!-- untuk menampilkan data matkul dalam bentuk tabel -->
    <table id="tabel" class="table table-stripped table-bordered" style="width:100%">
      <thead>
        <tr>
        <th>No</th>
        <th>Nama Mata Kuliah</th>
        <th>Kelas</th>
        <th>Ruangan</th>
        <th>Hari</th>
        <th>Waktu</th>
        <th>Tahun Ajaran</th>
        <th>Semester</th>
        <th>Aksi</th>

      </tr>
      </thead>
      <tbody>
        <!-- memanggil data dari controller dengan var. matkul -->
        <?php $no=1; foreach($matkul as $a)
          {    
           ?>
        <tr>
          <td><?php echo $no  ?></td>
          <td><?php echo $a->nama_matkul; ?></td>
          <td><?php echo $a->nama_kelas; ?></td>
          <td><?php echo $a->nama_ruang; ?></td>
          <td><?php echo $a->hari; ?></td>
          <td><?php echo $a->mulai; ?> - <?php echo $a->selesai; ?></td>
          <td><?php echo $a->tahun_ajaran; ?></td>
          <td><?php echo $a->semester; ?></td>
          <td><a href="<?php echo base_url('mata_kuliah/edit_matkul/'.$a->id_matakuliah);?>" class="btn btn-success">Edit</a>&nbsp<a href="<?php echo base_url('mata_kuliah/hapus_matkul/'.$a->id_matakuliah);?>" onclick="return confirm('Ingin menghapus data?');" class="btn btn-danger">Delete</a></td> 
        </tr>
        <?php $no++;
        } 
        ?>
      </tbody>
      
    </table>