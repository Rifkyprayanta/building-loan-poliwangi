 <div class="row">
        <div class="col-lg-4 col-xs-6">
          <!-- small box -->
          <!-- ini adalah informasi yang ditampilkan dari halaman dasboard admin berupa informasi ruangan terpakai dengan memanggil controller admin function index dengan var. dasboard-->
          <?php foreach ($dasboard as $a) { ?>
          
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3><?php echo $a->dipinjam;?></h3>

              <p>Ruangan Terpakai</p>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        
        <!-- ./col -->
        <!-- ini adalah informasi yang ditampilkan dari halaman dasboard admin berupa informasi ruangan terpakai dengan memanggil controller admin function index dengan var. persen-->
        <?php foreach ($persen as $a) { ?>
        <div class="col-lg-4 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3><?php echo $a->persen;?><sup style="font-size: 20px">%</sup></h3>

              <p>Presentase Peminjam</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
      <?php } ?>
        <!-- ./col -->
        <!-- ini adalah informasi yang ditampilkan dari halaman dasboard admin berupa informasi ruangan terpakai dengan memanggil controller admin function index dengan var. user-->
        <?php foreach ($user as $a) { ?>
        <div class="col-lg-4 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3><?php echo $a->register;?></h3>

              <p>Jumlah User Registrasi</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        <?php } ?>
        <?php } ?>
        </div>
      </div>