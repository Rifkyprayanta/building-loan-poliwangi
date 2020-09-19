<a href="<?php echo base_url('user/tambah_user/')?>" class="btn btn-success">Tambah User</a>    
    <br>
    <br>
    <?php echo $this->session->set_flashdata('hasil'); ?>
    <table id="tabel" class="table table-stripped table-bordered" style="width:100%">
      <thead>
        <tr>
        <th>No</th>
        <th>Nama</th>
        <th>Username</th>
        <th>Password</th>
        <th>Foto</th>
        <th>Level</th>
        <th>Aksi</th>
      </tr>
      </thead>
      <tbody>
        <?php $no=1; foreach ($user as $a)
         { 
         ?>
        <tr>
          <td><?php echo $no  ?></td>
          <td><?php echo $a->nama; ?></td>
          <td><?php echo $a->username; ?></td>
          <td><?php echo $a->password; ?></td>
           <td><img style="max-width: 100px; max-height: 100px;" src="<?php echo base_url().'assets/user/'.$a->foto;?>"></td>
          <?php if($a->level == 0) {
            $tampil = "Admin";

          }
          elseif ($a->level == 1) {
            $tampil = "Pimpinan";
          }
          else 
          {
            $tampil = "Peminjam";
          }
          ?>
          <td><?php echo $tampil; ?></td>
          <td><a href="<?php echo base_url('user/edit_user/'.$a->id_user);?>" class="btn btn-success">Edit</a>&nbsp<a href="<?php echo base_url('user/delete_user/'.$a->id_user);?>" onclick="return confirm('Ingin menghapus data?');" class="btn btn-danger">Delete</a></td> 
        </tr>
        <?php $no++;
        } 
        ?>
      </tbody>
    </table>