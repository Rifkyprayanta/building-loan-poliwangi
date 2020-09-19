<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Admin Peminjaman Gedung</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  
  <link rel="icon" type="image/png" href="<?php echo base_url() ?>assets/login/images/icons/polcon.ico"/>
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?php echo base_url('assets/admin/bootstrap/css/bootstrap.min.css') ;?>">

  <!-- Bootstrap Select -->
  <link rel="stylesheet" href="<?php echo base_url('assets/bsselect/dist/css/bootstrap-select.min.css') ;?>">
  
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url('assets/admin/bower_components/font-awesome/css/font-awesome.min.css');?>">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo base_url('assets/admin/bower_components/Ionicons/css/ionicons.min.css') ;?>">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url('assets/admin/dist/css/AdminLTE.min.css') ;?>">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?php echo base_url('assets/admin/dist/css/skins/_all-skins.min.css') ;?>">
  <!-- Morris chart -->
  <link rel="stylesheet" href="<?php echo base_url('assets/admin/bower_components/morris.js/morris.css') ;?>">
  <!-- jvectormap -->
  <link rel="stylesheet" href="<?php echo base_url('assets/admin/bower_components/jvectormap/jquery-jvectormap.css') ;?>">
  <!-- Date Picker -->
  <link rel="stylesheet" href="<?php echo base_url('assets/admin/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css') ;?>">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="<?php echo base_url('assets/admin/bower_components/bootstrap-daterangepicker/daterangepicker.css') ;?>">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="<?php echo base_url('assets/admin/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css') ;?>">

  <link rel="stylesheet" href="<?php echo base_url('assets/datatables/datatables/css/dataTables.bootstrap.css'); ?>">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

      <!-- Script untuk memanggil navbar atas -->
      <?php $this->load->view('navbar/navbar'); ?>

      <!-- Script untuk memanggil sidebar samping -->
      <aside class="main-sidebar">
      <?php $this->load->view('sidebar/sidebar'); ?>
      </aside>
  
  
  <div class="content-wrapper">
    <!-- Small boxes (Stat box) -->
      <!-- /.row -->
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <?php echo $judul ?>
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      
      
      <!-- Main row -->
      <div class="row">
          <div class="col-xs-12">
           <div class="box box-primary">
            <div class="box-body">
            <?php 
              if(!empty($content)){
              echo $content;
              }
            ?>
          </div>
          </div>
        </div>
      </div>
      <!-- /.row (main row) -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 2.4.0
    </div>
    <strong>Copyright &copy; 2018 Khusnul Khotimah</a>.</strong> All rights
    reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Create the tabs -->
    <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
      <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
      <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
    </ul>
  </aside>
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<script src="<?php echo base_url('assets/jquery/jquery-3.3.1.min.js') ;?>"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?php echo base_url('assets/jquery/jquery-ui.min.js') ;?>"></script>

<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>

  <script type="text/javascript" src="<?php echo base_url('assets/datatables/datatables/js/jquery.dataTables.min.js'); ?>"></script>
  <script type="text/javascript" src="<?php echo base_url('assets/datatables/datatables/js/dataTables.bootstrap.js'); ?>"></script>
<!-- jQuery 3 -->
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->

<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url('assets/admin/bower_components/bootstrap/dist/js/bootstrap.min.js');?>"></script>
<!-- Morris.js charts -->
<script src="<?php echo base_url('assets/admin/bower_components/raphael/raphael.min.js');?>"></script>
<script src="<?php echo base_url('assets/admin/bower_components/morris.js/morris.min.js');?>"></script>
<!-- Sparkline -->
<script src="<?php echo base_url('assets/admin/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js');?>"></script>
<!-- jvectormap -->
<script src="<?php echo base_url('assets/admin/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js');?>"></script>
<script src="<?php echo base_url('assets/admin/plugins/jvectormap/jquery-jvectormap-world-mill-en.js');?>"></script>
<!-- jQuery Knob Chart -->
<script src="<?php echo base_url('assets/admin/bower_components/jquery-knob/dist/jquery.knob.min.js');?>"></script>
<!-- daterangepicker -->
<script src="<?php echo base_url('assets/admin/bower_components/moment/min/moment.min.js');?>"></script>
<script src="<?php echo base_url('assets/admin/bower_components/bootstrap-daterangepicker/daterangepicker.js');?>"></script>

<!-- datepicker -->
<script src="<?php echo base_url('assets/admin/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js');?>"></script>

<!-- Bootstrap WYSIHTML5 -->
<script src="<?php echo base_url('assets/admin/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js');?>"></script>

<!-- Slimscroll -->
<script src="<?php echo base_url('assets/admin/bower_components/jquery-slimscroll/jquery.slimscroll.min.js');?>"></script>

<!-- FastClick -->
<script src="<?php echo base_url('assets/admin/bower_components/fastclick/lib/fastclick.js');?>"></script>

<!-- AdminLTE App -->
<script src="<?php echo base_url('assets/admin/dist/js/adminlte.min.js');?>"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?php echo base_url('assets/admin/dist/js/pages/dashboard.js');?>"></script>

<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url('assets/admin/dist/js/demo.js');?>"></script>

<script src="<?php echo base_url('assets/bsselect/dist/js/bootstrap-select.min.js') ;?>"></script>

<script src="<?php echo base_url('assets/bsselect/dist/i18n/defaults-*.min.js') ;?>"></script>
<script src="<?php echo base_url('assets/password/dist/bootstrap-show-password.min.js') ;?>"></script>

<script>
    $(document).ready(function() {
    $('#tabel').DataTable( {
        initComplete: function () {
            this.api().columns().every( function () {
                var column = this;
                var select = $('<select><option value=""></option></select>')
                    .appendTo( $(column.footer()).empty() )
                    .on( 'change', function () {
                        var val = $.fn.dataTable.util.escapeRegex(
                            $(this).val()
                        );
 
                        column
                            .search( val ? '^'+val+'$' : '', true, false )
                            .draw();
                    } );
 
                column.data().unique().sort().each( function ( d, j ) {
                    select.append( '<option value="'+d+'">'+d+'</option>' )
                } );
            } );
        }
    } );
} );
</script>

</body>
</html>
