<div class="container" >
   <!-- Untuk mengedit jadwal ruangan dengan memanggil data sesuai id masing2 -->
    <div class="col-lg-12">
		<?php foreach ($jadwal as $a)
         {
           	$sruang = $a->id_ruang;
           	$skelas = $a->id_kelas;
           	$swaktu = $a->id_waktu;
           	$sstatus = $a->id_status;
           	$smatkul = $a->id_matakuliah;
         ?><!-- form untuk mengirimkan data diteruskan ke controller dan function edit jadwal dengan id jadwal yang sesuai -->
		<form action="<?php echo base_url('ruangan/edit_jadwal/'.$id_jadwal)?>" class="form-horizontal" method="post">
		  <!-- nama -->
		    <div class="form-group">
		        <label class="col-lg-2 control-label">Nama Ruang :  </label>
		        <div class="col-lg-5">
		            <select name="id_ruang" class="form-control">
                        <?php foreach ($ruangan as $ruang) { 
                        	$selected = ($sruang == $ruang->id_ruang) ? "selected" : "";?>
                        	<option value="<?php echo $ruang->id_ruang?>" <?php echo $selected; ?>><?php echo $ruang->nama_ruang;?></option>
                        <?php }
                        ?>
                    </select>
		        </div>
		    </div>

		    <div class="form-group">
		        <label class="col-lg-2 control-label">Nama Matkul :  </label>
		        <div class="col-lg-5">
		            <select name="id_matakuliah" class="form-control">
                        <?php foreach ($matkul as $matkul) { 
                        	$selected = ($smatkul == $matkul->id_matakuliah) ? "selected" : "";?>
                        	<option value="<?php echo $matkul->id_matakuliah?>" <?php echo $selected; ?>><?php echo $matkul->nama_matkul;?></option>
                        <?php }
                        ?>
                    </select>
		        </div>
		    </div>

		    <div class="form-group">
		        <label class="col-lg-2 control-label">Kelas :  </label>
		        <div class="col-lg-5">
		            <select name="id_kelas" class="form-control">
                        <?php foreach ($kelas as $a) {
                            $selected = ($skelas == $a->id_kelas) ? "selected" : "";?>
                        	<option value="<?php echo $a->id_kelas?>" <?php echo $selected; ?>><?php echo $a->nama_kelas;?></option>
                        <?php } ?>    
                    </select>
		        </div>
		    </div>

		    <div class="form-group">
		        <label class="col-lg-2 control-label">Waktu :  </label>
		        <div class="col-lg-5">
		            <select name="id_waktu" class="form-control">
                        <?php foreach ($waktu as $a) { 
                            $selected = ($swaktu == $a->id_waktu) ? "selected" : "";?>
                        	<option value="<?php echo $a->id_waktu?>" <?php echo $selected; ?>><?php echo $a->hari;?> (<?php echo $a->jam_mulai;?> - <?php echo $a->jam_selesai;?>)</option>
                        <?php } ?>    
                    </select>
		        </div>
		    </div>

		    <div class="form-group">
		        <label class="col-lg-2 control-label">Status :  </label>
		        <div class="col-lg-5">
		            <select name="id_status" class="form-control">
                        <?php foreach ($status as $a) { 
                            $selected = ($sstatus == $a->id_status) ? "selected" : "";?>
                        	<option value="<?php echo $a->id_status?>" <?php echo $selected; ?>><?php echo $a->status;?></option>
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


	<?php } ?>
	</div>
</div>