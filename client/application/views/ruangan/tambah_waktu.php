		 
<div class="container" >
   
    <div class="col-lg-12">
		 <!-- form untuk mengirimkan data diteruskan ke controller ruangan dan function tambah waktu -->
		<form action="<?=site_url('ruangan/tambah_waktu')?>" enctype="multipart/form-data" class="form-horizontal" method="post">
		  <!-- nama -->
		    <!-- kategori -->
		    <div class="form-group">
		        <label class="col-lg-2 control-label">Hari :  </label>
		        <div class="col-lg-5">
		            <select name="hari" class="form-control">
					<option value="senin">Senin</option>
					<option value="selasa">Selasa</option>
					<option value="rabu">Rabu</option>
					<option value="kamis">Kamis</option>
					<option value="jumat">Jum'at</option>
					<option value="sabtu">Sabtu</option>
					<option value="minggu">Minggu</option>
					</select>
		        </div>
		    </div>

		    <div class="form-group">
		        <label class="col-lg-2 control-label">Jam Ke :  </label>
		        <div class="col-lg-5">
		            <select name="jamke" class="form-control">
					<option value="1">1</option>
					<option value="2">2</option>
					<option value="3">3</option>
					<option value="4">4</option>
					<option value="5">5</option>
					<option value="6">6</option>
					<option value="7">7</option>
					<option value="8">8</option>
					<option value="9">9</option>
					<option value="10">10</option>
					<option value="11">11</option>
					<option value="12">12</option>
					<option value="13">13</option>
					<option value="14">14</option>
					<option value="15">15</option>
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
		        <label class="col-lg-2 control-label"></label>
		        <div class="col-lg-5">
		            <button class="btn btn-primary" type="submit" name="submit">
		                <i class="glyphicon glyphicon-ok"></i>
		                Submit
		            </button>

		            <a href="<?=site_url('ruangan/waktu')?>" class="btn btn-danger">
		                <i class="glyphicon glyphicon-remove"></i>
		                cancel
		            </a>
		        </div>
		    </div>
		</form>
	</div>
</div>