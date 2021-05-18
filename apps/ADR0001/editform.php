<?php 
include_once("config/Config.php");
include_once("libs/database.php");
$Sql = "select * from rapat where id_rapat='".$_GET['id_rapat']."'";
$Qr=$Conn[2]->Query($Sql) or die ("Terdapat kesalahan perintah!"); 
$R=$Conn[2]->Row($Qr);
?>
<div class="container-fluid">
	<div class="row">
		<div class="col-12">
			<div class="card">
				<div class="card-header">
					<div class="box-header">
					  <h3 class="box-title">Edit jadwal Rapat</h3>
					</div><!-- /.box-header -->
					<div class="box-body">
					  <form role="form" method="post" action="./?module=<?php echo $_GET['module']?>&&cmd=edit">
					  <input type="hidden" name="id_rapat" value="<?php echo $R['id_rapat']; ?>">
						<!-- text input -->
						<div class="form-group">
						  <label>Nama Rapat</label>
						  <input type="text" name="nama_rapat" class="form-control" placeholder="Nama Rapat" value="<?php echo $R['nama_rapat']; ?>"/>
						  <label>ID Tempat</label>
						  <input type="text" name="id_tempat" class="form-control" placeholder="ID Tempat" value="<?php echo $R['id_tempat']; ?>"/>
						  <label>Waktu Mulai</label>
						  <input type="datetime-local" name="wkt_mulai" class="form-control" placeholder="Waktu Mulai" value="<?php echo $R['wkt_mulai']; ?>"/>
						  <label>Waktu Selesai</label>
						  <input type="datetime-local" name="wkt_selesai" class="form-control" placeholder="Waktu Selesai" value="<?php echo $R['wkt_selesai']; ?>"/>
						</div>

						<button type="submit" class="btn btn-success"> <i class="fa fa-save"></i> Simpan</button>
						<button type="reset" class="btn btn-warning"> <i class="fa fa-backward"></i> Reset Data </button>
						<a href="./?module=<?php echo $_GET['module']?>" class="btn btn-danger"> <i class="fa fa-times"></i> Batal</a>
					  </form>
					</div><!-- /.box-body -->
				</div><!-- /.box -->
			</div><!--/.col (right) -->
		</div>
	</div>
</div>