<?php 
include_once("config/Config.php");
include_once("libs/database.php");
$Sql = "select * from rapat";
$Sql1 = "select * from rapat where status=0";
$Sql2 = "select * from rapat where status=1";

$data_rapat = $Conn[2]->Query($Sql) or die ("Terdapat kesalahan perintah!"); 
$data_rapat1 = $Conn[2]->Query($Sql1) or die ("Terdapat kesalahan perintah!"); 
$data_rapat2 = $Conn[2]->Query($Sql2) or die ("Terdapat kesalahan perintah!"); 

 ?>
 <div class="row">
    <div class="col-lg-3 col-xs-6">
      <!-- small box -->
      <div class="small-box bg-blue">
        <div class="inner">
          <h3><?php echo $Conn[2]->Num_rows($data_rapat); ?></h3>
          <p>Data Rapat</p>
        </div>
        <div class="icon">
          <i class="fa fa-user"></i>
        </div>
        <a href="#" class="small-box-footer"></a>
      </div>
    </div><!-- ./col -->
	<div class="col-lg-3 col-xs-6">
      <!-- small box -->
      <div class="small-box bg-green">
        <div class="inner">
          <h3><?php echo $Conn[2]->Num_rows($data_rapat1); ?></h3>
          <p>Data Rapat Belum Dimulai</p>
        </div>
        <div class="icon">
          <i class="fa fa-user"></i>
        </div>
        <a href="#" class="small-box-footer"></a>
      </div>
    </div><!-- ./col -->
	<div class="col-lg-3 col-xs-6">
      <!-- small box -->
      <div class="small-box bg-dark">
        <div class="inner">
          <h3><?php echo $Conn[2]->Num_rows($data_rapat2); ?></h3>
          <p>Data Rapat Sedang Berjalan</p>
        </div>
        <div class="icon">
          <i class="fa fa-user"></i>
        </div>
        <a href="#" class="small-box-footer"></a>
      </div>
    </div><!-- ./col -->
</div>