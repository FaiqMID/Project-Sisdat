<?php 
	if(!isset($_SESSION['islogin'])){
		require_once('systems\login.php');
	}else {
		if (isset($_GET['cmd'])== 'add') {
			include_once("config/Config.php");
			include_once("libs/database.php");
			$Sql = "INSERT INTO rapat(id_rapat, id_tempat, nama_rapat, wkt_mulai, wkt_selesai, status) VALUES('$_POST[id_rapat]','$_POST[id_tempat]','$_POST[nama_rapat]','$_POST[wkt_mulai]','$_POST[wkt_selesai]',0)";
	
			$Qr=$Conn[2]->Query($Sql) or die ("Terdapat kesalahan perintah!"); 
			echo "<script> window.location = './?module=".$_GET['module']."';</script>";
		}else{
			require_once("systems\/404.php");
		}
	}
?>