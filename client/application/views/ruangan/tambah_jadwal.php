<div class="container" >  
    <div class="col-lg-12">
		 <!-- form untuk mengirimkan data diteruskan ke controller ruangan dan function tambah jadwal -->
		<form action="<?=site_url('ruangan/tambah_jadwal')?>" enctype="multipart/form-data" class="form-horizontal" method="post">
		  <!-- nama -->
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
		        <label class="col-lg-2 control-label">Nama Matkul :  </label>
		        <div class="col-lg-5">
		        	<select name="id_matakuliah" class="form-control">
                        <?php foreach ($matkul as $a) { ?>
                            <option value="<?php echo $a->id_matakuliah;?>"><?php echo $a->nama_matkul;?></option>
                        <?php } ?>    
                    </select>
		        </div>
		    </div>

		    <div class="form-group">
		        <label class="col-lg-2 control-label">Kelas :  </label>
		        <div class="col-lg-5">
		            <select name="id_kelas" class="form-control">
                        <?php foreach ($kelas as $a) { ?>
                            <option value="<?php echo $a->id_kelas;?>"><?php echo $a->nama_kelas;?></option>
                        <?php } ?>    
                    </select>
		        </div>
		    </div>

		    <div class="form-group">
		        <label class="col-lg-2 control-label">Waktu :  </label>
		        <div class="col-lg-5">
		            <select name="id_waktu" class="form-control">
                        <?php foreach ($waktu as $a) { ?>
                            <option value="<?php echo $a->id_waktu;?>"><?php echo $a->hari;?> - (<?php echo $a->jam_mulai;?> - <?php echo $a->jam_selesai;?>)</option>
                        <?php } ?>    
                    </select>
		        </div>
		    </div>

		    <div class="form-group">
		        <label class="col-lg-2 control-label">Status :  </label>
		        <div class="col-lg-5">
		            <select name="id_status" class="form-control">
                        <?php foreach ($status as $a) { ?>
                            <option value="<?php echo $a->id_status;?>"><?php echo $a->status;?></option>
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

		            <a href="<?=site_url('ruangan/')?>" class="btn btn-danger">
		                <i class="glyphicon glyphicon-remove"></i>
		                cancel
		            </a>
		        </div>
		    </div>


		</form>
	</div>
</div>