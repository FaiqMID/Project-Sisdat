<?php
if(isset($_GET['cmd'])){
	$path = "";
	if (isset($_GET['module'])){
		$path = "apps\\".$_GET['module']."\\";
	}
	if ($_GET['cmd']=='reqedit'){
		$file = $path.'editform.php';
		if (file_exists($file)) {
			require_once($file);
		}
		else {
			require_once("systems\/404.php");
		}
	}else if ($_GET['cmd']=='edit'){
		$file = $path.'edit.php';
		if (file_exists($file)) {
			require_once($file);
		}
		else {
			require_once("systems\/404.php");
		}
	}else if ($_GET['cmd']=='reqadd'){
		$file = $path.'addform.php';
		if (file_exists($file)) {
			require_once($file);
		}
		else {
			require_once("systems\/404.php");
		}
	}else if ($_GET['cmd']=='add'){
		$file = $path.'add.php';
		if (file_exists($file)) {
			require_once($file);
		}
		else {
			require_once("systems\/404.php");
		}
	}else if ($_GET['cmd']=='del'){
		$file = $path.'del.php';
		if (file_exists($file)) {
			require_once($file);
		}
		else {
			require_once("systems\/404.php");
		}
	}else if ($_GET['cmd']=='start'){
		$file = $path.'start.php';
		if (file_exists($file)) {
			require_once($file);
		}
		else {
			require_once("systems\/404.php");
		}
	}else if ($_GET['cmd']=='stop'){
		$file = $path.'stop.php';
		if (file_exists($file)) {
			require_once($file);
		}
		else {
			require_once("systems\/404.php");
		}
	}else{
		require_once("systems\/404.php");
	}	
} else {
	require_once('listdata.php');
}
	
?>