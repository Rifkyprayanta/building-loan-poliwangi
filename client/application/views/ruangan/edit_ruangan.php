<div class="container" >
   <!-- Untuk mengedit ruangan dengan memanggil data sesuai id masing2 -->
    <div class="col-lg-12">
		<?php foreach ($ruangan as $a)
         {
           	$slantai = $a->id_lantai;
           	$status = $a->status_ruang;
         ?><!-- form untuk mengirimkan data diteruskan ke controller dan function edit ruangan dengan id ruangan yang sesuai -->
		<form action="<?php echo base_url('ruangan/edit_ruangan/'.$id_ruang)?>" class="form-horizontal" method="post">
		  <!-- nama -->
		    <div class="form-group">
		        <label class="col-lg-2 control-label">Nama Ruang :  </label>
		        <div class="col-lg-5">
		            <input type="text" name="nama_ruang" value="<?php echo $a->nama_ruang; ?>" class="form-control" placeholder="Nama Ruangan">
		        </div>
		    </div>

		    <div class="form-group">
		        <label class="col-lg-2 control-label">Lantai :  </label>
		        <div class="col-lg-5">
		            <select name="id_lantai" class="form-control">
                        <?php foreach ($lantai as $a) {
                            $selected = ($slantai == $a->id_lantai) ? "selected" : "";?>
                        	<option value="<?php echo $a->id_lantai?>" <?php echo $selected; ?>><?php echo $a->nama_lantai;?> (<?php echo $a->nama_gedung;?>) </option>
                        <?php } ?>    
                    </select>
		        </div>
		    </div>
			
			 <div class="form-group">
		        <label class="col-lg-2 control-label">Status Ruangan :  </label>
		        <div class="col-lg-5">
		            <select name="status_ruang" class="form-control">
    					<option value="baik" <?php if($status == "baik") { echo "SELECTED"; } ?>>Baik</option>
    					<option value="rusak" <?php if($status  == "rusak") { echo "SELECTED"; } ?>>Rusak</option>
                            
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

		            <a href="<?=site_url('ruangan/ruangan')?>" class="btn btn-danger">
		                <i class="glyphicon glyphicon-remove"></i>
		                cancel
		            </a>
		        </div>
		    </div>
		</form>


	<?php } ?>
	</div>
</div>