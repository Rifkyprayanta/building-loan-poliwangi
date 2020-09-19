<div class="container" >   
    <div class="col-lg-12">
		<?php foreach ($user as $user)
         {
		    $skelas = $user->id_kelas;
         ?>
		<form action="<?php echo base_url('user/edit_user/'.$id_user)?>" enctype="multipart/form-data" class="form-horizontal" method="post">
		  <!-- nama -->
		    <div class="form-group">
		        <label class="col-lg-2 control-label">Nama :  </label>
		        <div class="col-lg-5">
		            <input type="text" name="nama" value="<?php echo $user->nama; ?>" class="form-control" placeholder="Nama User" required>
		        </div>
		    </div>

		    <div class="form-group">
		        <label class="col-lg-2 control-label">Pengguna :  </label>
		        <div class="col-lg-5">
		            <input type="text" name="username" value="<?php echo $user->username; ?>" class="form-control" placeholder="Username" required>
		        </div>
		    </div>

		    <div class="form-group">
		        <label class="col-lg-2 control-label">Password :  </label>
		        <div class="col-lg-5">
		            <input type="password" name="password" id="password" data-toggle="password" value="<?php echo $user->password; ?>" class="form-control" placeholder="Password" required>
		        </div>
		    </div>

		    <div class="form-group">
		        <label class="col-lg-2 control-label">Level : </label>
		        <div class="col-lg-5">
		        	<select class="form-control" name="level">
		        		<option name="level" value="0">Admin</option>
		        		<option name="level" value="1">Pimpinan</option>
		        		<option name="level" value="2">Peminjam</option>
		        	</select>
		        </div>
		    </div>

		     <div class="form-group">
		        <label class="col-lg-2 control-label">Gambar :  </label>
		        <div class="col-lg-5">
		            <input type="file" name="foto" class="form-control" placeholder="Gambar" required="">
		        </div>
		    </div>

		     <div class="form-group">
		        <label class="col-lg-2 control-label">Nama Kelas :  </label>
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
		        <label class="col-lg-2 control-label"></label>
		        <div class="col-lg-5">
		          	<img style="max-width: 300px; max-height: 300px;" src="<?php echo base_url().'assets/user/'.$user->foto;?>">
		        </div>
		    </div>
		    
		    <input type="hidden" name="id_user" class="form-control" value="<?php echo $user->id_user; ?>" class="form-control">



		    <!-- kategori -->
		    <!-- alamat -->
		    
		    <div class="form-group">
		        <label class="col-lg-2 control-label"></label>
		        <div class="col-lg-5">
		            <button class="btn btn-primary" type="submit" name="submit">
		                <i class="glyphicon glyphicon-ok"></i>
		                Submit
		            </button>

		            <a href="<?=site_url('user/')?>" class="btn btn-danger">
		                <i class="glyphicon glyphicon-remove"></i>
		                cancel
		            </a>
		        </div>
		    </div>
		</form>


	<?php } ?>
	</div>
</div>

<script type="text/javascript">
	$("#password").password('toggle');
</script>
