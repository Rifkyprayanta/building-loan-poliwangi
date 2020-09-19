    <!--data ditampilkan dibawah ini apabila memiliki akses 0 yaitu admin -->
    <?php if($this->session->userdata('akses')=='0') {?>
<!-- button untuk menambah data jadwal ruangan -->
    <a href="<?php echo base_url('ruangan/tambah_jadwal/')?>" class="btn btn-success">Tambah Jadwal</a>
     <a href="<?php echo base_url('ruangan/form/')?>" class="btn btn-success">Import Jadwal</a>
     <form action="<?=site_url('ruangan/import')?>" enctype="multipart/form-data" method="post">
        <input type="file" name="excel" />
        <p class="help">* Gunakan file dengan extensi .xlsx</p>
        <button type="submit" name="submit" value="upload">Upload... </button>
    </form>
<!-- untuk menampilkan data jadwal ruangan dalam tabel -->
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
        <th>Aksi</th>
      </tr>
      </thead>
      <tbody>
        <!-- memanggil data dari controller ruangan function jadwal dengan var. jadwal -->
        <?php $no=1; foreach($jadwal as $a)
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
          <td><a href="<?php echo base_url('ruangan/edit_jadwal/'.$a->id_jadwal);?>" class="btn btn-success">Edit</a>&nbsp<a href="<?php echo base_url('ruangan/delete_jadwal/'.$a->id_jadwal);?>" onclick="return confirm('Ingin menghapus data?');" class="btn btn-danger">Delete</a></td> 
        </tr>
        <?php $no++;
        } 
        ?>
      </tbody>
    </table>

    <?php } else { ?>
      <!-- dan menampilkan data dibawah ini apabila itu 1 yaitu pimpinan -->
      <table id="tabel" class="table table-stripped table-bordered" style="width:100%">
      <thead>
        <tr>
        <th>No</th>
        <th>Nama Ruang</th>
        <th>Kelas</th>
        <th>Hari</th>
        <th>Waktu</th>
      </tr>
      </thead>
      <tbody>
        <?php $no=1; foreach($jadwal as $a)
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
          <td><?php echo $a->nama_kelas; ?></td>
          <td><?php echo $a->hari; ?></td>
          <td><?php echo $a->jam_mulai; ?> - <?php echo $a->jam_selesai; ?></td>
        </tr>
        <?php $no++;
        } 
        ?>
      </tbody>
    </table>
  <?php } ?>