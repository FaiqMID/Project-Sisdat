<?php 
	if(!isset($_SESSION['islogin'])){
		require_once('systems\login.php');
	}else {
		if (isset($_GET['cmd'])== 'edit') {
			include_once("config/Config.php");
			include_once("libs/database.php");
			$Sql = "UPDATE rapat SET nama_rapat='$_POST[nama_rapat]', id_tempat='$_POST[id_tempat]', wkt_mulai='$_POST[wkt_mulai]', wkt_selesai='$_POST[wkt_selesai]' WHERE id_rapat='$_POST[id_rapat]'";
			$Qr=$Conn[2]->Query($Sql) or die ("Terdapat kesalahan perintah!"); 
			echo "<script> window.location = './?module=".$_GET['module']."';</script>";
		}else{
			require_once("systems\/404.php");
		}
	}
?>