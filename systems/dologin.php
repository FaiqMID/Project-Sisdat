<?php
include_once("./../config/Config.php");
include_once("./../libs/database.php");

$userId 	= $_POST['userId'];
$userPasswd   	= $_POST['userPasswd'];
$Sql = "select userid, firstname,lastname,groupid from tusers where username='$userId' and userpass=md5(concat('$userId','$userPasswd'))";
//echo $Sql;
$Qr=$Conn[0]->Query($Sql) or die ("Terdapat kesalahan perintah!"); 
$jml = $Conn[0]->Num_rows($Qr);
$R=$Conn[0]->Row($Qr);

if ($jml > 0){
	session_start();
	$_SESSION['nama'] = $R['firstname'].' '.$R['lastname'];
	$_SESSION['groupid'] = $R['groupid'];
	$_SESSION['userid'] = $R['userid'];
	$_SESSION['islogin'] = true;
	
	header('Location:./../');
}else{
   echo "<script>alert('UserId / Password salah ..!!!!!, Silakan Ulangi Lagi'); window.location = './../'</script>";
}
$Conn[0]->Close(); 
?>