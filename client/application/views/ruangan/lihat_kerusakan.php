
  <table id="tabel" class="table table-stripped table-bordered" style="width:100%">
    <thead>
        <tr>
        <th>No</th>
        <th>Nama Pelapor</th>
        <th>Nama Fasilitas</th>
        <th>Laporan</th>
        <th>Status</th>
        <th>Foto</th>
        <th>Aksi</th>
      </tr>
    </thead>
      <tbody><!-- memanggil data dari controller fasilitasRuang function fasilitasRuang dengan var. fasilitasRuang -->

        <?php $no=1; foreach($fas as $a)
          { ?>
        <tr>
          <td><?php echo $no  ?></td>
          <td><?php echo $a->nama; ?></td>
          <td><?php echo $a->nama_fasilitas; ?></td>
          <td><?php echo $a->laporan; ?></td>
          <td><?php echo $a->status; ?></td>
          <td><img style="max-width: 100px; max-height: 100px;" src="<?php echo base_url().'assets/kerusakan/'.$a->foto;?>"></td>
           <td><a href="<?php echo base_url('ruangan/edit_kerusakan/'.$a->id_lapor);?>" class="btn btn-success">Edit</a></td>
        </tr>
        <?php $no++;
        } 
        ?>
      </tbody>
  </table>