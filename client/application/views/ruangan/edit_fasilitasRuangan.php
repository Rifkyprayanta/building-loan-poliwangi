<div class="container" >
<!-- Untuk mengedit fasilitas dengan memanggil data sesuai id masing2 -->   
    <div class="col-lg-12">
    	<?php foreach ($fasilitasRuang as $a)
         {
           	$sfasilitas = $a->id_fasilitas;
           	$snamaruangan = $a->id_ruang;
         ?>
		<!-- form untuk mengirimkan data diteruskan ke controller dan function edit ruangan dengan id fasilitasruang yang sesuai -->
		<form action="<?php echo base_url('ruangan/edit_fasilitasRuangan/'.$id_fasilitasruang)?>" class="form-horizontal" method="post">
		  <!-- nama -->

		  
		    <div class="form-group">
		        <label class="col-lg-2 control-label">Nama Ruangan :  </label>
		        <div class="col-lg-5">
		      	<select name="id_ruang" class="form-control">
                        <?php foreach ($ruangan as $a) { 
                            $selected = ($snamaruangan == $a->id_ruang) ? "selected" : "";?>
                        	<option value="<?php echo $a->id_ruang?>" <?php echo $selected; ?>><?php echo $a->nama_ruang;?></option>
                        <?php } ?>    
                    </select>
		        </div>
		    </div>
		    
		    

		    <div class="form-group">
		        <label class="col-lg-2 control-label">Jumlah Fasilitas :  </label>
		        <div class="col-lg-5">
		        	<?php foreach ($fasilitasRuang as $a) { ?>
		            <input type="text" name="jml" value="<?php echo $a->jml; ?>" class="form-control" placeholder="Jumlah Fasilitas Kelas">
		            <?php } ?>
		        </div>
		    </div>

		    <div class="form-group">
		        <label class="col-lg-2 control-label">Nama Fasilitas :  </label>
		        <div class="col-lg-5">
		      	<select name="id_fasilitas" class="form-control">
                        <?php foreach ($fasilitas as $a) {                            
                        	$selected = ($sfasilitas == $a->id_fasilitas) ? "selected" : "";?>
                        	<option value="<?php echo $a->id_fasilitas?>" <?php echo $selected; ?>><?php echo $a->nama_fasilitas;?></option>
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

		            <a href="<?=site_url('ruangan/fasilitasRuangan')?>" class="btn btn-danger">
		                <i class="glyphicon glyphicon-remove"></i>
		                cancel
		            </a>
		        </div>
		    </div>
		</form>
	<?php } ?>
	</div>
</div>