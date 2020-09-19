<div class="container" >
   <!-- Untuk mengedit fasilitas var fasilitas -->
    <div class="col-lg-12">
		<?php foreach ($fasilitas as $a)
         {
           
         ?>
         <!-- form untuk mengirimkan data diteruskan ke controller dan function edit fasilitas dengan id fasilitas yang sesuai -->
		<form action="<?php echo base_url('ruangan/edit_fasilitas/'.$id_fasilitas)?>" class="form-horizontal" method="post">
		  <!-- nama -->
		    <div class="form-group">
		        <label class="col-lg-2 control-label">Nama Fasilitas :  </label>
		        <div class="col-lg-5">
		            <input type="text" name="nama_fasilitas" value="<?php echo $a->nama_fasilitas; ?>" class="form-control" placeholder="Nama Fasilitas">
		        </div>
		    </div>
		    
		    <div class="form-group">
		        <label class="col-lg-2 control-label"></label>
		        <div class="col-lg-5">
		            <button class="btn btn-primary" type="submit" name="submit">
		                <i class="glyphicon glyphicon-ok"></i>
		                Submit
		            </button>

		            <a href="<?=site_url('ruangan/fasilitas')?>" class="btn btn-danger">
		                <i class="glyphicon glyphicon-remove"></i>
		                cancel
		            </a>
		        </div>
		    </div>
		</form>


	<?php } ?>
	</div>
</div>