<?php 
include_once("config/Config.php");
include_once("libs/database.php");
$Sql = "select * from rapat natural join tempat where status=1";
$Qr=$Conn[2]->Query($Sql) or die ("Terdapat kesalahan perintah!"); 
$jml = $Conn[2]->Num_rows($Qr);
?>

<div class="container-fluid">
	<div class="row">
		<div class="col-12">
			<div class="card">
			  <div class="card-header">
				<h3 class="box-title">Daftar Rapat yang sedang berjalan( Terdapat <?php echo $jml; ?> Data)</h3>
			  </div>
			  <!-- /.card-header -->
			  <div class="card-body">
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
