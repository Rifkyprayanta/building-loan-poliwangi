		 
<div class="container" >
   
    <div class="col-lg-12">
		 <!-- form untuk mengirimkan data diteruskan ke controller ruangan dan function tambah ruangan -->
		<form action="<?=site_url('ruangan/tambah_ruangan')?>" enctype="multipart/form-data" class="form-horizontal" method="post">
		  <!-- nama -->
		    <!-- kategori -->
		    <div class="form-group">
		        <label class="col-lg-2 control-label">Nama Ruangan :  </label>
		        <div class="col-lg-5">
		            <input type="text" name="nama_ruang" class="form-control" placeholder="Masukkan Nama Ruangan">
		        </div>
		    </div>

		     <div class="form-group">
		        <label class="col-lg-2 control-label">Lantai :  </label>
		        <div class="col-lg-5">
		            <select name="id_lantai" class="form-control">
                        <?php foreach ($lantai as $a) { ?>
                            <option value="<?php echo $a->id_lantai;?>"><?php echo $a->nama_lantai;?> (<?php echo $a->nama_gedung;?>)</option>
                        <?php } ?>    
                    </select>
		        </div>
		    </div>

		    <div class="form-group">
		        <label class="col-lg-2 control-label">Status :  </label>
		        <div class="col-lg-5">
		            <select name="status_ruang" class="form-control">
                        <option value="baik">Baik</option>
    					<option value="rusak">Rusak</option>    
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
	</div>
</div>