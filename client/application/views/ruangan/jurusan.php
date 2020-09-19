    <!-- button untuk menambah data jurusan -->
    <a href="<?php echo base_url('ruangan/tambah_jurusan/')?>" class="btn btn-success">Tambah Jurusan</a>
    <br>
    <br>
    <?php echo $this->session->set_flashdata('hasil'); ?>
<!-- untuk menampilkan data jurusan dalam bentuk tabel -->
    <table id="tabel" class="table table-stripped table-bordered" style="width:100%">
      <thead>
        <tr>
        <th>No</th>
        <th>Nama Jurusan</th>
        <th>Aksi</th>
      </tr>
      </thead>
      <tbody>
        <!-- memanggil data dari controller ruangan function jurusan dengan var. jurusan -->
        <?php $no=1; foreach($jurusan as $a)
          { ?>
        <tr>
          <td><?php echo $no  ?></td>
          <td><?php echo $a->nama_jurusan; ?></td>
          <td><a href="<?php echo base_url('ruangan/edit_jurusan/'.$a->id_jurusan);?>" class="btn btn-success">Edit</a>&nbsp<a href="<?php echo base_url('ruangan/delete_jurusan/'.$a->id_jurusan);?>" onclick="return confirm('Ingin menghapus data?');" class="btn btn-danger">Delete</a></td> 
        </tr>
        <?php $no++;
        } 
        ?>
      </tbody>
    </table>