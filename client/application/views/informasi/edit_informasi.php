<!-- Untuk mengedit informasi memanggil data dengan var informasi dan ditampilkan datanya sesuai dengan id yang dipilih -->
<div class="container" >
    <div class="col-lg-12">
		<?php foreach ($informasi as $a)
         {
         ?>
         <!-- form untuk mengirimkan data diteruskan ke controller dan function edit informasi dengan id berita yang sesuai -->
		<form action="<?php echo base_url('informasi_gedung/edit_informasi/'.$id_berita)?>" enctype="multipart/form-data" class="form-horizontal" method="post">
		  
		    <div class="form-group">
		        <label class="col-lg-2 control-label">Judul Acara :  </label>
		        <div class="col-lg-5">
		            <input type="text" name="judul_acara" value="<?php echo $a->judul_acara; ?>" class="form-control" placeholder="Nama Mata Kuliah">
		        </div>
		    </div>

		    <div class="form-group">
		        <label class="col-lg-2 control-label">Tanggal :  </label>
		        <div class="col-lg-5">
		            <input type="date" name="tanggal" value="<?php echo $a->tanggal; ?>" class="form-control" placeholder="Nama Mata Kuliah">
		        </div>
		    </div>

		    <div class="form-group">
		        <label class="col-lg-2 control-label">Gambar :  </label>
		        <div class="col-lg-5">
		          	<input type="file" name="gambar" class="form-control">
		        </div>
		    </div>

		    <div class="form-group">
		        <label class="col-lg-2 control-label"></label>
		        <div class="col-lg-5">
		          	<img style="max-width: 300px; max-height: 300px;" src="<?php echo base_url().'assets/berita/'.$a->foto;?>">
		        </div>
		    </div>
		  	<!-- id berita disembunyikan, untuk mendapatkan id berita -->   
		    <input type="hidden" name="id_berita" class="form-control" value="<?php echo $a->id_berita; ?>" class="form-control">
		    
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
		                Batal
		            </a>
		        </div>
		    </div>
		</form>


	<?php } ?>
	</div>
</div>