<div class="container-fluid">
	<div class="row">
		<div class="col-12">
			<div class="card">
				<div class="card-header">
					<div class="box-header">
					  <h3 class="box-title">Tambah Jadwal Rapat</h3>
					</div><!-- /.box-header -->
					<div class="box-body">
					  <form role="form" method="post" action="./?module=<?php echo $_GET['module']?>&&cmd=add">
					  
						<!-- text input -->
						<div class="form-group">
						<label>ID Rapat</label>
						  <input type="text" name="id_rapat" class="form-control" placeholder="ID Rapat" value=""/>
						  <label>Nama Rapat</label>
						  <input type="text" name="nama_rapat" class="form-control" placeholder="Nama Rapat" value=""/>
						  <label>ID Tempat</label>
						  <input type="text" name="id_tempat" class="form-control" placeholder="ID Tempat" value=""/>
						  <label>Waktu Mulai</label>
						  <input type="datetime-local" name="wkt_mulai" class="form-control" placeholder="Waktu Mulai" value=""/>
						  <label>Waktu Selesai</label>
						  <input type="datetime-local" name="wkt_selesai" class="form-control" placeholder="Waktu Selesai" value=""/>
						  
						</div>

						<button type="submit" class="btn btn-success"> <i class="fa fa-save"></i> Simpan</button>
						<button type="reset" class="btn btn-warning"> <i class="fa fa-trash"></i> Reset</button>
						<a href="./?module=<?php echo $_GET['module']?>" class="btn btn-danger"> <i class="fa fa-times"></i> Batal</a>
					  </form>
					</div><!-- /.box-body -->
				</div>
	      </div><!-- /.box -->
	    </div><!--/.col (right) -->
	</div>
</section>