<div class="container" >
   <!-- Untuk mengedit kelas dengan memanggil data-->
    <div class="col-lg-12">
		<?php foreach ($kelas as $a)
         {
           $sprodi = $a->id_prodi;
         ?><!-- form untuk mengirimkan data diteruskan ke controller dan function edit kelas dengan id kelas yang sesuai -->
		<form action="<?php echo base_url('ruangan/edit_kelas/'.$id_kelas)?>" class="form-horizontal" method="post">
		  <!-- nama -->
		    <div class="form-group">
		        <label class="col-lg-2 control-label">Nama Kelas :  </label>
		        <div class="col-lg-5">
		            <input type="text" name="nama_kelas" value="<?php echo $a->nama_kelas; ?>" class="form-control" placeholder="Nama Kelas">
		        </div>
		    </div>

		    <div class="form-group">
		        <label class="col-lg-2 control-label">Nama Prodi :  </label>
		        <div class="col-lg-5">
		            <select name="id_prodi" class="form-control">
                        <?php foreach ($prodi as $a) { 
                        	$selected = ($sprodi == $a->id_prodi) ? "selected" : "";?>
                        	<option value="<?php echo $a->id_prodi?>" <?php echo $selected; ?>><?php echo $a->nama_prodi;?></option>
                        <?php } ?>    
                    </select>
		        </div>
		    </div>
		    
		    <div class="form-group">
		        <label class="col-lg-2 control-label"></label>
		        <div class="col-lg-5">
		            <button class="btn btn-primary" type="submit" name="submit">
		                <i class="glyphicon glyphicon-ok"></i>
		                Submit
		            </button>

		            <a href="<?=site_url('ruangan/kelas')?>" class="btn btn-danger">
		                <i class="glyphicon glyphicon-remove"></i>
		                cancel
		            </a>
		        </div>
		    </div>
		</form>


	<?php } ?>
	</div>
</div>