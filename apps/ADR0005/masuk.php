<?php 
	if(!isset($_SESSION['islogin'])){
		require_once('systems\login.php');
	}else {
		if (isset($_GET['cmd'])== 'masuk') {
			include_once("config/Config.php");
			include_once("libs/database.php");
			$Sql = "INSERT INTO presensi(id_rapat, id_pengguna, start, stop) VALUES ('".$_GET['id_rapat']."','".$_SESSION['userid']."',CURRENT_TIMESTAMP,CURRENT_TIMESTAMP)";
			echo $Sql;
			$Qr=$Conn[2]->Query($Sql) or die ("Terdapat kesalahan perintah!"); 
			echo "<script> window.location = './?module=".$_GET['module']."';</script>";
		}else{
			require_once("systems\/404.php");
		}
	}
?>