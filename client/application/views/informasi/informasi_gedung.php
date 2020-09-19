    
    <!-- Untuk data tabel dengan session hak akses 0 yaitu admin -->
    <?php if($this->session->userdata('akses')=='0') {?>
     
    <a href="<?php echo base_url('informasi_gedung/tambah_informasi/')?>" class="btn btn-success">Tambah Informasi Gedung</a>
    <br>
    <br>
    <!-- Untuk menampilkan informasi gedung dengan tabel -->
    <table id="tabel" class="table table-stripped table-bordered" style="width:100%">
      <thead>
        <tr>
        <th>No</th>
        <th>Judul Acara</th>
        <th>Tanggal</th>
        <th>Foto</th>
        <th>Aksi</th>
      </tr>
      </thead>
      <tbody>
        <!-- memanggil data dari controller dengan var. informasi -->
        <?php $no=1; foreach($informasi as $a)
          { ?>
        <tr>
          <td><?php echo $no  ?></td>
          <td><?php echo $a->judul_acara; ?></td>
          <td><?php echo $a->tanggalan; ?></td>
          <td><img style="max-width: 100px; max-height: 100px;" src="<?php echo base_url().'assets/berita/'.$a->foto;?>"></td>
          <td><a href="<?php echo base_url('informasi_gedung/edit_informasi/'.$a->id_berita);?>" class="btn btn-success">Edit</a>&nbsp<a href="<?php echo base_url('informasi_gedung/hapus_informasi/'.$a->id_berita);?>" onclick="return confirm('Ingin menghapus data?');" class="btn btn-danger">Delete</a></td> 
        </tr>
        <?php $no++;
        } 
        ?>
      </tbody>
    </table>

    <?php } else { ?> 
      <!-- Untuk data tabel dengan session hak akses 2 yaitu peminjam -->
      <!-- Untuk menampilkan informasi gedung dengan tabel -->
        <table id="tabel" class="table table-stripped table-bordered" style="width:100%">
      <thead>
        <tr>
        <th>No</th>
        <th>Judul Acara</th>
        <th>Tanggal</th>
        <th>Foto</th>
        
      </tr>
      </thead>
      <tbody>
        <!-- memanggil data dari controller dengan var. informasi -->
        <?php $no=1; foreach($informasi as $a)
          { ?>
        <tr>
          <td><?php echo $no  ?></td>
          <td><?php echo $a->judul_acara; ?></td>
          <td><?php echo $a->tanggalan; ?></td>
          <td><img style="max-width: 100px; max-height: 100px;" src="<?php echo base_url().'assets/berita/'.$a->foto;?>"></td>
        </tr>
        <?php $no++;
        } 
        ?>
      </tbody>
    </table>











      <?php } ?>