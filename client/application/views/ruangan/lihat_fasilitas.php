    <!-- digunakan untuk melihat fasilitas yang ada -->
    <br>
    <table id="tabel" class="table table-stripped table-bordered" style="width:100%">
      <thead>
        <tr>
        <th>No</th>
        <th>Nama Fasilitas</th>
        <th>Jumlah</th>
      </tr>
      </thead>
      <tbody><!-- memanggil data dari controller ruangan function fas dengan var. fas -->

        <?php $no=1; foreach($fas as $a)
          { ?>
        <tr>
          <td><?php echo $no  ?></td>
          <td><?php echo $a->id_fasilitas; ?></td>
          <td><?php echo $a->jml; ?></td>
        </tr>
        <?php $no++;
        } 
        ?>
      </tbody>
    </table>