<!-- form untuk mengirimkan data diteruskan ke controller peminjaman dan function simpan -->
<form action="<?php echo base_url('peminjaman/simpan')?>" enctype="multipart/form-data" class="form-horizontal" method="post">
	
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
	    <label class="col-lg-2 control-label">Nama Peminjam :  </label>
		    <div class="col-lg-5">
		        <select name="id_user" class="selectpicker" data-live-search="true">
                        <?php foreach ($user as $a) { ?>
                            <option value="<?php echo $a->id_user;?>"><?php echo $a->nama;?></option>
                        <?php } ?>    
                    </select>
  	        </div>
	</div>

	<div class="form-group">
	    <label class="col-lg-2 control-label">Jam Mulai :  </label>
		    <div class="col-lg-5">
		         <input type="time" name="jam_mulai" class="form-control" placeholder="Masukkan Jam Mulai">
	        </div>
	</div>

	<div class="form-group">
	    <label class="col-lg-2 control-label">Jam Selesai :  </label>
		    <div class="col-lg-5">
		         <input type="time" name="jam_selesai" class="form-control" placeholder="Masukkan Jam Selesai">
	        </div>
	</div>

	<div class="form-group">
	    <label class="col-lg-2 control-label">Tanggal :  </label>
		    <div class="col-lg-5">
		         <input type="date" name="tgl_pinjam" class="form-control" placeholder="Masukkan Nama Mata Kuliah">
	        </div>
	</div>

	<div class="form-group">
	    <label class="col-lg-2 control-label">Status :  </label>
		    <div class="col-lg-5">
		         <select name="status" class="form-control">
		         	<option value="kosong">kosong</option>
		        	<option value="booking">booking</option>
		        	<option value="dipinjam">dipinjam</option>
		        	<option value="dikembalikan">dikembalikan</option>
		        </select>
	        </div>
	</div>
	<div class="form-group">
		<label class="col-lg-2 control-label"></label>
		 <div class="col-lg-5">
	<?php foreach ($lastid as $b) { ?>
	 <input type="hidden" name="id_peminjaman" class="form-control" value="<?php echo $b->id; ?>" class="form-control">
	 <?php } ?>
	</div>
	</div>


	<div class="form-group">
		<label class="col-lg-2 control-label"></label>
	        <div class="col-lg-5">
	            <button class="btn btn-primary" type="submit" name="submit">		   
	                <i class="glyphicon glyphicon-ok"></i>
		                Submit
		        </button>

		        <a href="<?=site_url('peminjaman/')?>" class="btn btn-danger">
		            <i class="glyphicon glyphicon-remove"></i> Batal
		        </a>
		    </div>
	</div>
</form>
	