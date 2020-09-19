		 
<div class="container" >
   
    <div class="col-lg-12">
		 <!-- form untuk mengirimkan data diteruskan ke controller ruangan dan function tambah kelas -->
		<form action="<?=site_url('ruangan/tambah_kelas')?>" enctype="multipart/form-data" class="form-horizontal" method="post">
		  <!-- nama -->
		    <!-- kategori -->
		    <div class="form-group">
		        <label class="col-lg-2 control-label">Nama Kelas :  </label>
		        <div class="col-lg-5">
		            <input type="text" name="nama_kelas" class="form-control" placeholder="Masukkan Nama Kelas">
		        </div>
		    </div>

		    <div class="form-group">
		        <label class="col-lg-2 control-label">Nama Prodi :  </label>
		        <div class="col-lg-5">
		            <select name="id_prodi" class="form-control">
                        <?php foreach ($prodi as $a) { ?>
                            <option value="<?php echo $a->id_prodi;?>"><?php echo $a->nama_prodi;?></option>
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
	</div>
</div>