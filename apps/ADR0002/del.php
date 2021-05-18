<?php 
	if(!isset($_SESSION['islogin'])){
		require_once('systems\login.php');
	}else {
		if (isset($_GET['cmd'])== 'del') {
			include_once("config/Config.php");
			include_once("libs/database.php");
			$Sql = "UPDATE rapat SET status=2 WHERE id_rapat='".$_GET['id_rapat']."'";
			echo $Sql;
			$Qr=$Conn[2]->Query($Sql) or die ("Terdapat kesalahan perintah!"); 
			echo "<script> window.location = './?module=".$_GET['module']."';</script>";
		}else{
			require_once("systems\/404.php");
		}
	}
?>