<!-- Untuk menambahkan informasi gedung -->
<div class="container" >
   
    <div class="col-lg-12">
		 <!-- form untuk mengirimkan data diteruskan ke controller informasi gedungdan function tambah informasi -->
		<form action="<?php echo base_url('informasi_gedung/tambah_informasi')?>" enctype="multipart/form-data" class="form-horizontal" method="post">
		    <div class="form-group">
		        <label class="col-lg-2 control-label">Judul Acara :  </label>
		        <div class="col-lg-5">
		            <input type="text" name="judul_acara" class="form-control" placeholder="Masukkan Judul Acara">
		        </div>
		    </div>

		    <div class="form-group">
		        <label class="col-lg-2 control-label">Tanggal :  </label>
		        <div class="col-lg-5">
		            <input type="date" name="tanggal" class="form-control" placeholder="Masukkan Tanggal">
		        </div>
		    </div>

		    <div class="form-group">
		        <label class="col-lg-2 control-label">Foto :  </label>
		        <div class="col-lg-5">
		            <input type="file" name="foto" class="form-control" placeholder="Masukkan Tanggal">
		        </div>
		    </div>


		    <div class="form-group">
		        <label class="col-lg-2 control-label"></label>
		        <div class="col-lg-5">
		        	<!-- button submit form -->
		            <button class="btn btn-primary" type="submit" name="submit">
		                <i class="glyphicon glyphicon-ok"></i>
		                Submit
		            </button>
					<!-- button batal -->
		            <a href="<?=site_url('informasi_gedung/')?>" class="btn btn-danger">
		                <i class="glyphicon glyphicon-remove"></i>
		                cancel
		            </a>
		        </div>
		    </div>
		</form>
	</div>
</div>