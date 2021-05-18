<?php 
include_once("config/Config.php");
include_once("libs/database.php");
$Sql = "SELECT rapat.id_rapat,rapat.nama_rapat,presensi.start,presensi.stop
FROM rapat
INNER JOIN undangan
ON rapat.id_rapat = undangan.id_rapat and undangan.id_pengguna='".$_SESSION['userid']."' and rapat.status=1
LEFT JOIN presensi
on rapat.id_rapat=presensi.id_rapat and undangan.id_pengguna=presensi.id_pengguna";
$Qr=$Conn[2]->Query($Sql) or die ("Terdapat kesalahan perintah!"); 
$jml = $Conn[2]->Num_rows($Qr);
?>

<div class="container-fluid">
	<div class="row">
		<div class="col-12">
			<div class="card">
			  <div class="card-header">
				<h3 class="box-title">Presensi Rapat ( Terdapat <?php echo $jml; ?> Data)</h3>
			  </div>
			  <!-- /.card-header -->
			  <div class="card-body">
				
					 
				 
				<table id="tabel" class="table table-bordered table-hover">
				  <thead>
				  <tr>
					<th>NO</th>
					<th>ID RAPAT</th>
					<th>NAMA</th>
					<th>WAKTU MASUK</th>
					<th>WAKTU KELUAR</th>
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
						<td><?php echo $R['start']?></td>
						<td><?php echo $R['stop']?></td>
						<td>
							<a class="btn btn-success btn-sm" href="./?module=<?php echo $_GET['module']?>&cmd=masuk&id_rapat=<?php echo $R['id_rapat']; ?>">Masuk</a>
							<a class="btn btn-danger btn-sm" onclick="return confirm('Apakah anda yakin akan keluar?')" href="./?module=<?php echo $_GET['module']?>&cmd=keluar&id_rapat=<?php echo $R['id_rapat']; ?>">Keluar</a>

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
