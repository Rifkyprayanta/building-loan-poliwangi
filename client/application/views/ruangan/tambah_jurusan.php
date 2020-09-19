		 
<div class="container" >
   
    <div class="col-lg-12">
		 <!-- form untuk mengirimkan data diteruskan ke controller ruangan dan function tambah jurusan -->
		<form action="<?=site_url('ruangan/tambah_jurusan')?>" enctype="multipart/form-data" class="form-horizontal" method="post">
		  <!-- nama -->
		    <!-- kategori -->
		    <div class="form-group">
		        <label class="col-lg-2 control-label">Nama Jurusan :  </label>
		        <div class="col-lg-5">
		            <input type="text" name="nama_jurusan" class="form-control" placeholder="Masukkan Nama Jurusan">
		        </div>
		    </div>
		    <div class="form-group">
		        <label class="col-lg-2 control-label"></label>
		        <div class="col-lg-5">
		            <button class="btn btn-primary" type="submit" name="submit">
		                <i class="glyphicon glyphicon-ok"></i>
		                Submit
		            </button>

		            <a href="<?=site_url('ruangan/jurusan')?>" class="btn btn-danger">
		                <i class="glyphicon glyphicon-remove"></i>
		                cancel
		            </a>
		        </div>
		    </div>


		</form>
	</div>
</div>