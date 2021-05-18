<?php
    include('NDB.php');
	/*
		init DB
		Create object from class Db
		Set property for the connection
	*/
	//Connection 1.
    $Conn[0] = new NDB();
	$Conn[0]->User = $UserDb[0];
	$Conn[0]->Pass = $PassDb[0];
	$Conn[0]->SrvType= $DbType[0];
	$Conn[0]->Host= $HostDb[0];
	$Conn[0]->Port = $PortDb[0];
	$Conn[0]->Db = $Db[0];
	$Conn[0]->Persistent = $Persistent[0];
 
	//$Conn[0]->Connect();
	//Connection 2.

    $Conn[1] = new NDB();
	$Conn[1]->User = $User[1];
	$Conn[1]->Pass = $Pass[1];
	$Conn[1]->SrvType= $DbType[1];
	$Conn[1]->Host= $Host[1];
	$Conn[1]->Port = $Port[1];
	$Conn[1]->Db = $Db[1];
	$Conn[1]->Persistent= $Persistent[1];
	//$Conn[1]->Connect();
	
	//Connection 3.

    $Conn[2] = new NDB();
	$Conn[2]->User = $User[2];
	$Conn[2]->Pass = $Pass[2];
	$Conn[2]->SrvType= $DbType[2];
	$Conn[2]->Host= $Host[2];
	$Conn[2]->Port = $Port[2];
	$Conn[2]->Db = $Db[2];
	$Conn[2]->Persistent= $Persistent[2];
	//$Conn[2]->Connect();

	//Connection 
?>