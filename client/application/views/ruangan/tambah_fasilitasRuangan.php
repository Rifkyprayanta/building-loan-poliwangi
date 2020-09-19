<div class="container" >
   
    <div class="col-lg-12">
		 <!-- form untuk mengirimkan data diteruskan ke controller  ruangan dan function tambah fasilitasruangan -->
		<form action="<?=site_url('ruangan/tambah_fasilitasRuangan')?>" enctype="multipart/form-data" class="form-horizontal" method="post">
		  <!-- nama -->
		    <!-- kategori -->
		    <div class="form-group">
		        <label class="col-lg-2 control-label">Nama Fasilitas :  </label>
		        <div class="col-lg-5">
		           <select name="id_fasilitas" class="form-control">
                        <?php foreach ($fasilitas as $a) { ?>
                            <option value="<?php echo $a->id_fasilitas;?>"><?php echo $a->nama_fasilitas;?></option>
                        <?php } ?>    
                    </select>
		        </div>
		    </div>

		    <div class="form-group">
		        <label class="col-lg-2 control-label">Jumlah Fasilitas :  </label>
		        <div class="col-lg-5">
		            <input type="number" name="jml" class="form-control" placeholder="Masukkan Jumlah Fasilitas">
		        </div>
		    </div>

		    <div class="form-group">
		        <label class="col-lg-2 control-label">Nama Ruangan :  </label>
		        <div class="col-lg-5">
		           <select name="id_ruang" class="form-control">
                        <?php foreach ($ruangan as $a) { ?>
                            <option value="<?php echo $a->id_ruang;?>"><?php echo $a->nama_ruang;?></option>
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
	</div>
</div>