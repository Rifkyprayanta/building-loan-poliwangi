		 
<div class="container" >
   
    <div class="col-lg-12">
		 
		<form action="<?php echo base_url('user/tambah_user')?>" enctype="multipart/form-data" class="form-horizontal" method="post">
		  <!-- nama -->
		    <div class="form-group">
		        <label class="col-lg-2 control-label">Nama :  </label>
		        <div class="col-lg-5">
		            <input type="text" name="nama" class="form-control" placeholder="Nama User" required="">
		        </div>
		    </div>

		    <div class="form-group">
		        <label class="col-lg-2 control-label">Pengguna :  </label>
		        <div class="col-lg-5">
		            <input type="text" name="username" class="form-control" placeholder="Username" required="">
		        </div>
		    </div>

		    <div class="form-group">
		        <label class="col-lg-2 control-label">Password :  </label>
		        <div class="col-lg-5">
		            <input type="password" name="password" class="form-control" placeholder="Password" required="">
		        </div>
		    </div>
		    <div class="form-group">
		        <label class="col-lg-2 control-label">Gambar :  </label>
		        <div class="col-lg-5">
		            <input type="file" name="foto" class="form-control" placeholder="Gambar" required="">
		        </div>
		    </div>
		    <!-- kategori -->
		    <!-- alamat -->
		    <div class="form-group">
		        <label class="col-lg-2 control-label">Level : </label>
		        <div class="col-lg-5">
		            <select name="level" class="form-control" required="">
		            	<option value="0">Admin</option>
		            	<option value="1">Pimpinan</option>
		            	<option value="2">Peminjam</option>
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
		        <label class="col-lg-2 control-label"></label>
		        <div class="col-lg-5">
		            <button class="btn btn-primary" type="submit" name="submit">
		                <i class="glyphicon glyphicon-ok"></i>
		                Submit
		            </button>

		            <a href="<?=site_url('user')?>" class="btn btn-danger">
		                <i class="glyphicon glyphicon-remove"></i>
		                cancel
		            </a>
		        </div>
		    </div>


		</form>
	</div>
</div>