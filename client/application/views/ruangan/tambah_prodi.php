		 
<div class="container" >
   
    <div class="col-lg-12">
		 <!-- form untuk mengirimkan data diteruskan ke controller ruangan dan function tambah prodi -->
		<form action="<?=site_url('ruangan/tambah_prodi')?>" enctype="multipart/form-data" class="form-horizontal" method="post">
		  <!-- nama -->
		    <!-- kategori -->
		    <div class="form-group">
		        <label class="col-lg-2 control-label">Nama Program Studi :  </label>
		        <div class="col-lg-5">
		            <input type="text" name="nama_prodi" class="form-control" placeholder="Masukkan Nama Program Studi">
		        </div>
		    </div>

		    <div class="form-group">
		        <label class="col-lg-2 control-label">Nama Jurusan :  </label>
		        <div class="col-lg-5">
		            <select name="id_jurusan" class="form-control">
                        <?php foreach ($jurusan as $a) { ?>
                            <option value="<?php echo $a->id_jurusan;?>"><?php echo $a->nama_jurusan;?></option>
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
	</div>
</div>