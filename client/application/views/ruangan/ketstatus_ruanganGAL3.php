    <!-- button untuk menambah data prodi -->
    <br>
    <br>
    <!-- untuk menampilkan data prodi dalam bentuk tabel -->
    <table id="tabel" class="table table-stripped table-bordered" style="width:100%">
      <thead>
        <tr>
        <th>No</th>
        <th>Nama Ruang</th>
        <th>Mata Kuliah</th>
        <th>Kelas</th>
        <th>Hari</th>
        <th>Waktu</th>
        <th>Status</th>
      </tr>
      </thead>
      <tbody>
        <!-- memanggil data dari controller ruangan function prodi dengan var. prodi -->
        <?php $no=1; foreach($ruangan as $a)
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
            
        <tr>
          <td><?php echo $no  ?></td>
          <td><?php echo $a->nama_ruang; ?></td>
          <td><?php echo $a->nama_matkul; ?></td>
          <td><?php echo $a->nama_kelas; ?></td>
          <td><?php echo $a->hari; ?></td>
          <td><?php echo $a->jam_mulai; ?> - <?php echo $a->jam_selesai; ?></td>
          <td><?php echo $simpan; ?></td> 
        </tr>
        <?php $no++;
        } 
        ?>
      </tbody>
    </table>