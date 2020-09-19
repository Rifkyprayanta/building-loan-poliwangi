<!-- form untuk mengirimkan data diteruskan ke controller mata kuliah dan function tambah matkul -->
<form action="<?=site_url('mata_kuliah/tambah_matkul')?>" enctype="multipart/form-data" class="form-horizontal" method="post">
	<div class="form-group">
	    <label class="col-lg-2 control-label">Nama Mata Kuliah :  </label>
		    <div class="col-lg-5">
		        <input type="text" name="nama_matkul" class="form-control" placeholder="Masukkan Nama Mata Kuliah">
	        </div>
	</div>

	<div class="form-group">
	    <label class="col-lg-2 control-label">Nama Kelas :  </label>
		    <div class="col-lg-5">
		        <select name="id_kelas" class="form-control">
                        <?php foreach ($kelas as $a) { ?>
                            <option value="<?php echo $a->id_kelas;?>"><?php echo $a->nama_kelas;?></option>
                        <?php } ?>    
                    </select>
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
	    <label class="col-lg-2 control-label">Waktu :  </label>
		    <div class="col-lg-5">
		        <select name="id_waktu" class="form-control">
                        <?php foreach ($waktu as $a) { ?>
                            <option value="<?php echo $a->id_waktu;?>"><?php echo $a->hari;?> (<?php echo $a->jam_mulai;?> - <?php echo $a->jam_selesai;?>)</option>
                        <?php } ?>    
                    </select>
	        </div>
	</div>

	<div class="form-group">
	    <label class="col-lg-2 control-label">Tahun Ajaran :  </label>
		    <div class="col-lg-5">
		    	<select name="tahun_ajaran" class="form-control">
		        	<option value="2017/2018">2017/2018</option>
		        	<option value="2018/2019">2018/2019</option>
		        	<option value="2019/2020">2019/2020</option>
		        	<option value="2020/2021">2020/2021</option>
		        	<option value="2021/2022">2021/2022</option>
		        	<option value="2022/2023">2022/2023</option>
		        	<option value="2023/2024">2023/2024</option>
		        	<option value="2024/2025">2024/2025</option>
		        </select>
	        </div>
	</div>

	<div class="form-group">
	    <label class="col-lg-2 control-label">Semester :  </label>
		    <div class="col-lg-5">
		        <select name="semester" class="form-control">
		        <option value="ganjil">Ganjil</option>
		        <option value="genap">Genap</option>
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

		        <a href="<?=site_url('mata_kuliah/')?>" class="btn btn-danger">
		            <i class="glyphicon glyphicon-remove"></i> Batal
		        </a>
		    </div>
	</div>
</form>
	