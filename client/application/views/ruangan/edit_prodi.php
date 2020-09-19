<div class="container" >
   <!-- Untuk mengedit prodi dengan memanggil data sesuai id masing2 -->
    <div class="col-lg-12">
		<?php foreach ($prodi as $a)
         {
            $sjurusan = $a->id_jurusan;
         ?>
         <!-- form untuk mengirimkan data diteruskan ke controller dan function edit prodi dengan id prodi yang sesuai -->
		<form action="<?php echo base_url('ruangan/edit_prodi/'.$id_prodi)?>" class="form-horizontal" method="post">
		  <!-- nama -->
		    <div class="form-group">
		        <label class="col-lg-2 control-label">Nama Program Studi :  </label>
		        <div class="col-lg-5">
		            <input type="text" name="nama_prodi" value="<?php echo $a->nama_prodi; ?>" class="form-control" placeholder="Nama Prodi">
		        </div>
		    </div>

		    <div class="form-group">
		        <label class="col-lg-2 control-label">Nama Jurusan :  </label>
		        <div class="col-lg-5">
		            <select name="id_jurusan" class="form-control">
                        <?php foreach ($jurusan as $a) { 
                           $selected = ($sjurusan == $a->id_jurusan) ? "selected" : "";?>
                        	<option value="<?php echo $a->id_jurusan?>" <?php echo $selected; ?>><?php echo $a->nama_jurusan;?></option>
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

		            <a href="<?=site_url('ruangan/prodi')?>" class="btn btn-danger">
		                <i class="glyphicon glyphicon-remove"></i>
		                cancel
		            </a>
		        </div>
		    </div>
		</form>


	<?php } ?>
	</div>
</div>