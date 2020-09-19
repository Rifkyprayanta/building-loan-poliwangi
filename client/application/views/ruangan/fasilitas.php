   <!-- button untuk menambah data fasilitas -->
   <a href="<?php echo base_url('ruangan/tambah_fasilitas/')?>" class="btn btn-success">Tambah Fasilitas</a>
    <br>
    <br>
    <?php echo $this->session->set_flashdata('hasil'); ?>
<!-- untuk menampilkan data fasilitas dalam ruangan dalam bentuk tabel -->
    <table id="tabel" class="table table-stripped table-bordered" style="width:100%">
      <thead>
        <tr>
        <th>No</th>
        <th>Nama Fasilitas</th>
        <th>Aksi</th>
      </tr>
      </thead>
      <tbody>
        <!-- memanggil data dari controller ruangan function fasilitas dengan var. fasilitas -->
        <?php $no=1; foreach($fasilitas as $a)
          { ?>
        <tr>
          <td><?php echo $no  ?></td>
          <td><?php echo $a->nama_fasilitas; ?></td>
          <td><a href="<?php echo base_url('ruangan/edit_fasilitas/'.$a->id_fasilitas);?>" class="btn btn-success">Edit</a>&nbsp<a href="<?php echo base_url('ruangan/delete_fasilitas/'.$a->id_fasilitas
          );?>" onclick="return confirm('Ingin menghapus data?');" class="btn btn-danger">Delete</a></td> 
        </tr>
        <?php $no++;
        } 
        ?>
      </tbody>
    </table>