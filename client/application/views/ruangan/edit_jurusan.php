<div class="container" >
   
   <!-- Untuk mengedit data jurusan dengan memanggil data  -->
    <div class="col-lg-12">
		<?php foreach ($jurusan as $a)
         {
           
         ?>
         <!-- form untuk mengirimkan data diteruskan ke controller dan function edit_jurusan dengan id jurusan yang sesuai -->
		<form action="<?php echo base_url('ruangan/edit_jurusan/'.$id_jurusan)?>" class="form-horizontal" method="post">
		  <!-- nama -->
		    <div class="form-group">
		        <label class="col-lg-2 control-label">Nama Jurusan :  </label>
		        <div class="col-lg-5">
		            <input type="text" name="nama_jurusan" value="<?php echo $a->nama_jurusan; ?>" class="form-control" placeholder="Nama Jurusan">
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


	<?php } ?>
	</div>
</div>