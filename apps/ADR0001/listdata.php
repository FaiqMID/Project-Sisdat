<?php 
include_once("config/Config.php");
include_once("libs/database.php");
$Sql = "select * from rapat natural join tempat where status=0";
$Qr=$Conn[2]->Query($Sql) or die ("Terdapat kesalahan perintah!"); 
$jml = $Conn[2]->Num_rows($Qr);
?>

<div class="container-fluid">
	<div class="row">
		<div class="col-12">
			<div class="card">
			  <div class="card-header">
				<h3 class="box-title">Daftar Jadwal Rapat ( Terdapat <?php echo $jml; ?> Data)</h3>
			  </div>
			  <!-- /.card-header -->
			  <div class="card-body">
				
					 <a href="./?module=<?php echo $_GET['module']?>&cmd=reqadd" style="margin-bottom: 10px;" class="btn btn-md btn-primary"> <i class="fa fa-plus"></i> Buat Rapat</a>
				 
				<table id="tabel" class="table table-bordered table-hover">
				  <thead>
				  <tr>
					<th>NO</th>
					<th>ID RAPAT</th>
					<th>NAMA</th>
					<th>NAMA TEMPAT</th>
					<th>WAKTU MULAI</th>
					<th>WAKTU SELESAI</th>
				  </tr>
				  </thead>
				  <tbody>
					<?php
					  $no=1;
					  while($R=$Conn[2]->Row($Qr)){
					  ?>
					  <tr>
						<td><?php echo $no++; ?></td>          
						<td><?php echo $R['id_rapat']?></td>
						<td><?php echo $R['nama_rapat']?></td>
						<td><?php echo $R['nama_tempat']?></td>
						<td><?php echo $R['wkt_mulai']?></td>
						<td><?php echo $R['wkt_selesai']?></td>
						<td>
							<a class="btn btn-success btn-sm" href="./?module=<?php echo $_GET['module']?>&cmd=reqedit&id_rapat=<?php echo $R['id_rapat']; ?>">Edit</a>
							<a class="btn btn-danger btn-sm" onclick="return confirm('Apakah anda yakin akan menghapus data ini?')" href="./?module=<?php echo $_GET['module']?>&cmd=del&id_rapat=<?php echo $R['id_rapat']; ?>">Hapus</a>
							<a class="btn btn-warning btn-sm" href="./?module=ADR0012&id_rapat=<?php echo $R['id_rapat']; ?>">Daftar Undangan</a>
						</td>
					  </tr>
					  <?php
					  }
					  $Conn[2]->Close(); 
					  ?>
				  </tbody>
				</table>
			  </div>
			  <!-- /.card-body -->
			</div>
			<!-- /.card -->
		</div>
	</div>
</div>
