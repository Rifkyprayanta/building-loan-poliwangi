<!-- navbar adalah pecahan dari template yang digunakan sebagai tampilan navbar -->
<header class="main-header">


    <!-- Nama yang digunakan untuk ditampilkan pada halaman dengan hak akses sebagai admin UPK yaitu UPK -->

    <?php if($this->session->userdata('akses')=='0') { ?>
    <a href="index2.html" class="logo">
      <span class="logo-mini"><b>U</b>PK</span>
      <span class="logo-lg"><b>UPK</b></span>
    </a>
    <?php } ?>

    <!-- Nama yang digunakan untuk ditampilkan pada halaman dengan hak akses pimpinan yaitu PMP -->

    <?php if($this->session->userdata('akses')=='1') { ?>
    <a href="index2.html" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>PMP</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Pimpinan</b></span>
    </a>
    <?php } ?>

    <!-- Nama yang digunakan untuk ditampilkan pada halaman dengan hak akses peminjam yaitu PMJ -->

    <?php if($this->session->userdata('akses')=='2') { ?>
    <a href="index2.html" class="logo">
      <span class="logo-mini"><b>PMJ</b></span>
      <span class="logo-lg"><b>Peminjam</b></span>
    </a>
    <?php } ?>

    <nav class="navbar navbar-static-top">
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">

          <li>
            <a href="<?php echo base_url('index.php/login/logout'); ?>">Logout</i></a>
          </li>
        </ul>
      </div>
    </nav>
  </header> 