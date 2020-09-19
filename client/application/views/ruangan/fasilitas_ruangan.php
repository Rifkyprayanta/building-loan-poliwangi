    <!-- button untuk menambah data fasilitas ruangan -->
    <?php if($this->session->userdata('akses')=='0') { ?>
    <a href="<?php echo base_url('ruangan/tambah_fasilitasRuangan/')?>" class="btn btn-success">Tambah Fasilitas Ruangan</a>
    <br>
    <br>
    <?php echo $this->session->set_flashdata('hasil'); ?>
<!-- untuk menampilkan data fasilitas ruangan dalam bentuk tabel -->
    <table id="tabel" class="table table-stripped table-bordered" style="width:100%">
      <thead>
        <tr>
        <th>No</th>
        <th>Nama Ruangan</th>
        <th>Jumlah</th>
        <th>Nama Fasilitas</th>
        <th>Aksi</th>
      </tr>
      </thead>
      <tbody>
        <!-- memanggil data dari controller ruangan function fasilitasruangan dengan var. fasilitasRuang -->
        <?php $no=1; foreach($fasilitasRuang as $a)
          { ?>
        <tr>
          <td><?php echo $no  ?></td>
          <td><?php echo $a->nama_ruang; ?></td>
          <td><?php echo $a->jml; ?></td>
          <td><?php echo $a->nama_fasilitas; ?></td>
          <td><a href="<?php echo base_url('ruangan/edit_fasilitasRuangan/'.$a->id_fasilitasruang);?>" class="btn btn-success">Edit</a>&nbsp<a href="<?php echo base_url('ruangan/delete_fasilitasRuangan/'.$a->id_fasilitasruang);?>" onclick="return confirm('Ingin menghapus data?');" class="btn btn-danger">Delete</a>&nbsp<a href="<?php echo base_url('ruangan/lihatKerusakan/'.$a->id_fasilitasruang);?>" class="btn btn-default">Lihat Kerusakan</a></td>
        </tr>
        <?php $no++;
        } 
        ?>
      </tbody>
    </table>
    <?php } else { ?>

      <table id="tabel" class="table table-stripped table-bordered" style="width:100%">
      <thead>
        <tr>
        <th>No</th>
        <th>Nama Ruangan</th>
        <th>Jumlah</th>
        <th>Nama Fasilitas</th>
        <th>Aksi</th>
      </tr>
      </thead>
      <tbody>
        <?php $no=1; foreach($fasilitasRuang as $a)
          { ?>
        <tr>
          <td><?php echo $no  ?></td>
          <td><?php echo $a->nama_ruang; ?></td>
          <td><?php echo $a->nama_fasilitas; ?></td>
          <td><?php echo $a->jml; ?></td>
          <td><a href="<?php echo base_url('ruangan/lihatKerusakan/'.$a->id_fasilitasruang);?>" class="btn btn-default">Cek Kondisi</a></td>
        </tr>
        <?php $no++;
        } 
        ?>
      </tbody>
    </table>


      <?php } ?>