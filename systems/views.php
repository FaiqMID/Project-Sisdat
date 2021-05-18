<?php 
	if (isset($_GET['module'])){
		$path = "apps\\".$_GET['module']."\index.php";
		if (file_exists($path)) {
			require_once($path);
		}
		else {
			require_once("systems\/404.php");
		}
	} else {
		require_once("apps\SYS0001\index.php");
	}
 ?>