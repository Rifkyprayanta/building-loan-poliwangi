<!-- menampilkan status ruangan lantai 1 disusun berdaskan urutannya -->
<div class="row">
  <div class="col-sm-2">
  <p><h4><b>Keterangan : </b></h4></p>
</div>
</div>
<div class="row">
  <div class="col-sm-2">
      <div class="panel panel-default">
      <div class="panel-heading">
        <b>Kosong</b>
      </div>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-sm-2">
      <div class="panel panel-warning">
      <div class="panel-heading">
        <b>Terjadwal</b>
      </div>
    </div>
  </div>
</div>
<div class="row">
    <div class="col-sm-2">
      <div class="panel panel-danger">
      <div class="panel-heading">
        <b>Tidak Layak</b>
      </div>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-sm-2">
      <div class="panel panel-success">
      <div class="panel-heading">
        <b>Terpakai</b>
      </div>
    </div>
  </div>
</div>
<a href="<?php echo base_url('ruangan/statusRuanganGAL1/')?>" class="btn btn-success">Gedung A</a> <a href="<?php echo base_url('ruangan/statusRuanganGBL1/')?>" class="btn btn-success">Gedung B</a> <a href="<?php echo base_url('ruangan/statusRuanganGCL1/')?>" class="btn btn-success">Gedung C</a>
<br>
<br>
<a href="<?php echo base_url('ruangan/statusRuanganGAL1/')?>" class="btn btn-success">Lantai 1</a> <a href="<?php echo base_url('ruangan/statusRuanganGAL2/')?>" class="btn btn-success">Lantai 2</a> <a href="<?php echo base_url('ruangan/statusRuanganGAL3/')?>" class="btn btn-success">Lantai 3</a> <a href="<?php echo base_url('ruangan/statusRuanganGAL4/')?>" class="btn btn-success">Lantai 4</a>
<div class="row">
  <div class="col-sm-2">
    <br>
 <b>Ruangan Lantai 1 : </b>
</div>
</div>
<br>
<div class="row">
<?php $no=1; foreach($ruangan as $a)
    { $simpan = $a->id_jadwal;
      if($a->id_status == 1)
        { ?>
          <tr>
          <td>
          <div class="col-sm-2">
            <a href="<?php echo base_url('ruangan/ketstatusRuanganGAL3/'.$simpan);?>">
              <div class="panel panel-success">
              <div class="panel-heading">
                <b><?php echo $a->nama_ruang; ?></b>
              </div>
              </div>
              </a>
            </div>
          </td>
        </tr>
      <?php } 
      else if ($a->id_status == 2) { ?>
          <tr>
          <td>
            <!-- Kosong Warna Putih -->
            <div class="col-sm-2">
              <a href="<?php echo base_url('ruangan/ketstatusRuanganGAL3/'.$simpan);?>">
              <div class="panel panel-default">
              <div class="panel-heading">
                <b><?php echo $a->nama_ruang; ?></b>
              </div>
              </div>
              </a>
            </div>
          </td>
        </tr>
      <?php } 
      else if ($a->id_status == 3) { ?>
          <tr>  
          <td>
            <!-- Terjadwal Warna Kuning -->
            <div class="col-sm-2">
              <a href="<?php echo base_url('ruangan/ketstatusRuanganGAL3/'.$simpan);?>">
              <div class="panel panel-warning">
              <div class="panel-heading">
                <b><?php echo $a->nama_ruang; ?></b>
              </div>
              </div>
              </a>
            </div>
          </td>
        </tr>
      <?php } 
      else if ($a->id_status == 4) { ?>
          <tr>
          <td>
            <!-- Tidak Layak Warna Merah -->
            <div class="col-sm-2">
             <a href="<?php echo base_url('ruangan/ketstatusRuanganGAL3/'.$simpan);?>">
              <div class="panel panel-danger">
              <div class="panel-heading">
                <b><?php echo $a->nama_ruang; ?></b>
              </div>
              </div>
              </a>
            </div>
          </td>
        </tr>
      <?php } } ?>
</div>
