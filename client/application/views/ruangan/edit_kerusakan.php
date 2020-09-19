<div class="container" >
   <!-- Untuk mengedit jadwal ruangan dengan memanggil data sesuai id masing2 -->
    <div class="col-lg-12">
		<?php foreach ($fas as $a)
         {
         ?>
         <!-- form untuk mengirimkan data diteruskan ke controller dan function edit jadwal dengan id jadwal yang sesuai -->
		<form action="<?php echo base_url('ruangan/edit_kerusakan/'.$id_lapor)?>" class="form-horizontal" method="post">

		    <input type="hidden" name="id_fasilitasruang" class="form-control" value="<?php echo $a->id_fasilitasruang; ?>" class="form-control" readonly>
		     
		    <div class="form-group">
		        <label class="col-lg-2 control-label">Status :  </label>
		        <div class="col-lg-5">
		            <select class="form-control" name="status">
		        		<option  value="rusak">rusak</option>
		        		<option  value="ditangani">ditangani</option>
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

		            <a href="<?=site_url('ruangan/lihatKerusakan/'.$id_lapor)?>" class="btn btn-danger">
		                <i class="glyphicon glyphicon-remove"></i>
		                cancel
		            </a>
		        </div>
		    </div>
		</form>


	<?php } ?>
	</div>
</div>