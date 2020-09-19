      <!-- Untuk menampilkan form pencarian berdasarkan tanggal -->
    <?php echo form_open('laporan/search') ?>
   
    <div class="col-sm-3">
    <input type="date" class="form-control" name="tanggal" placeholder="search">
    </div>
    <div class="col-sm-3">
    <input type="date" class="form-control" name="tanggal1" placeholder="search">
    </div>    
    <input type="submit" name="cari" value="Cari" class="btn btn-success ">
    <input type="submit" name="reset" class="btn btn-default" value="Reset">
    
    <?php echo form_close() ?>
    <br>
     <div class="form-group">
      <div class="col-sm-3">
        <!-- button Untuk menampilkan form pencarian berdasarkan tanggal kemudian lakukan pencetakan -->
    <input type="submit" name="cetak" data-toggle="modal" data-target="#myModal" class="btn btn-primary" value="Cetak">
      </div>
    </div>
    <br>
    <br>
     <!-- Untuk menampilkan laporan peminjaman gedung dengan tabel -->
    <table id="tabel" class="table table-stripped table-bordered" style="width:100%">
      <thead>
        <tr>
        <th>No</th>
        <th>Ruangan</th>
        <th>Tanggal</th>
        <th>Jumlah Penggunaan</th>
      </tr>
      </thead>
      <tbody>
        <!-- Untuk menampilkan data dari controller laporan dengan var. laporan -->
       <?php $no=1; foreach($laporan as $a)
          {    
           ?>
        <tr>
          <td><?php echo $no  ?></td>
          <td><?php echo $a->nama_ruang; ?></td>
          <td><?php echo $a->tanggalan; ?></td>
          <td><?php echo $a->jumlah; ?></td>
        </tr>
        <?php $no++;
        } 
        ?>
      </tbody>
    </table>

    <!-- Untuk menampilkan modal dialog yang berisikan form tanggal yang akan dipilih untuk dicetak -->
    <div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
      <!-- konten modal-->
      <div class="modal-content">
        <!-- heading modal -->
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Print Filter</h4>
        </div>
        <!-- body modal -->
        <?php echo form_open('laporan/cetak') ?>
        <div class="modal-body">
          <div class="row">
          <div class="form-group">
            <label class="col-lg-5 control-label">Tanggal Awal :  </label>
              <div class="col-lg-12">
                <input type="date" name="tanggal" class="form-control" required="">
              </div>
             </div>
          </div>
          <br>
          <div class="row">
          <div class="form-group">
            <label class="col-lg-5 control-label">Tanggal Akhir :  </label>
              <div class="col-lg-12">
                <input type="date" name="tanggal1" class="form-control" required="">
              </div>
             </div>
          </div>
          <br>
          <input type="submit" name="cetak" value="Print" class="btn btn-success ">
        </div>
        <?php echo form_close() ?>

        <!-- footer modal -->
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
        </div>
      </div>
    </div>
  </div>