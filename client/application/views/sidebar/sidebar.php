
  <aside class="main-sidebar">
    
    <section class="sidebar">
      
      <div class="user-panel">
        <div class="pull-left image">
<!-- digunakan untuk menampilkan foto berdasarkan session dan identifikasi foto berdasarkan session -->
          <img src="<?php echo base_url(); ?>assets/user/<?php echo $this->session->userdata('foto'); ?>" alt="User Image">
        </div>
        <div class="pull-left info">
          <!-- Digunakan untuk memanggil session dengan keterangan nama. nantinya akan muncul nama sesuai username yang login -->
          <p>Halo, <?php echo $this->session->userdata('nama');?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Aktif</a>
        </div>
      </div>
      <!-- search form -->
      <!-- Menu Untuk Admin -->
      <?php if($this->session->userdata('akses')=='0') { ?>
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <li class="">
         <li><a href="<?php echo base_url('admin'); ?>"><i class="fa fa-dashboard"></i>Dasboard</a></li>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-user"></i>
            <span>User</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url('user'); ?>"><i class="fa fa-user-o"></i> Data User</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-building"></i>
            <span>Ruangan</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url('ruangan'); ?>"><i class="fa fa-circle-o"></i> Jadwal Ruangan</a></li>
            <li><a href="<?php echo base_url('ruangan/statusRuanganGAL1'); ?>"><i class="fa fa-circle-o"></i> Status Ruangan</a></li>
            <li><a href="<?php echo base_url('ruangan/fasilitasRuangan'); ?>"><i class="fa fa-circle-o"></i> Fasilitas Ruangan </a></li>
            <li><a href="<?php echo base_url('ruangan/jurusan'); ?>"><i class="fa fa-circle-o"></i> Data Jurusan </a></li>
            <li><a href="<?php echo base_url('ruangan/prodi'); ?>"><i class="fa fa-circle-o"></i> Data Prodi </a></li>
            <li><a href="<?php echo base_url('ruangan/kelas'); ?>"><i class="fa fa-circle-o"></i> Data Kelas </a></li>
            <li><a href="<?php echo base_url('ruangan/ruangan'); ?>"><i class="fa fa-circle-o"></i> Data Ruangan </a></li>
            <li><a href="<?php echo base_url('ruangan/waktu'); ?>"><i class="fa fa-circle-o"></i> Data Jam </a></li>
            <li><a href="<?php echo base_url('ruangan/fasilitas'); ?>"><i class="fa fa-circle-o"></i> Data Fasilitas </a></li>
          </ul>
        </li>
        <li>
          <a href="<?php echo base_url('mata_kuliah'); ?>">
            <i class="fa fa-book"></i> <span>Mata Kuliah</span>
            <span class="pull-right-container">
            </span>
          </a>
        </li>
        <li>
          <a href="<?php echo base_url('peminjaman'); ?>">
            <i class="fa fa-building"></i> <span>Data Peminjaman</span>
            <span class="pull-right-container">
            </span>
          </a>
        </li>
        <li>
        <li>
          <a href="<?php echo base_url('grafik'); ?>">
            <i class="fa fa-bar-chart"></i> <span>Grafik Penggunaan</span>
            <span class="pull-right-container">
            </span>
          </a>
        </li>
        <li>
          <a href="<?php echo base_url('informasi_gedung'); ?>">
            <i class="fa fa-building"></i> <span>Informasi Gedung</span>
            <span class="pull-right-container">
            </span>
          </a>
        </li>
        <li>
          <a href="<?php echo base_url('laporan'); ?>">
            <i class="fa fa-briefcase"></i> <span>Laporan</span>
            <span class="pull-right-container">
            </span>
          </a>
        </li>

      </ul>
    <?php } ?>

    <!-- Menu Untuk Pimpinan -->

      <?php if($this->session->userdata('akses')=='1') { ?>
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <li class="active treeview">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>Beranda</span>
            <span class="pull-right-container">
            </span>
          </a>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-building"></i>
            <span>Ruangan</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
             <li><a href="<?php echo base_url('ruangan'); ?>"><i class="fa fa-circle-o"></i> Jadwal Ruangan</a></li>
            <li><a href="<?php echo base_url('ruangan/statusRuanganGAL1'); ?>"><i class="fa fa-circle-o"></i> Status Ruangan</a></li>
            <li><a href="<?php echo base_url('ruangan/fasilitasRuangan'); ?>"><i class="fa fa-circle-o"></i> Fasilitas Ruangan </a></li>
          </ul>
        </li>
       <li>
          <a href="<?php echo base_url('informasi_gedung/'); ?>">
            <i class="fa fa-building"></i> <span>Informasi Gedung</span>
            <span class="pull-right-container">
            </span>
          </a>
        </li>
        <li>
          <a href="<?php echo base_url('laporan'); ?>">
            <i class="fa fa-briefcase"></i> <span>Laporan</span>
            <span class="pull-right-container">
            </span>
          </a>
        </li>
        
      </ul>
    <?php } ?>

    <?php if($this->session->userdata('akses')=='2') { ?>
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <li class="active treeview">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>Beranda</span>
            <span class="pull-right-container">
            </span>
          </a>
        </li>
        <li>
          <a href="<?php echo base_url('informasi_gedung/'); ?>">
            <i class="fa fa-building"></i> <span>Informasi Gedung</span>
            <span class="pull-right-container">
            </span>
          </a>
        </li>
      </ul>
    <?php } ?>

    </section>
    <!-- /.sidebar -->
  </aside>