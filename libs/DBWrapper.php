<?php
	//Set Config
    $DB = new NDB();
	$DB->User = $User;
	$DB->Pass = $Pass;
	$DB->SrvType= $DbType;
	$DB->Host= $Host;
	$DB->Port = $Port;
	$DB->Db = $Db;
	
	//map function
    function Connect(){
		GLOBAL $DB;
		return $DB->Connect(); 
	};
	function PConnect(){
		GLOBAL $DB;
		return $DB->PConnect(); 
	};
	function Query($Sql){
		GLOBAL $DB;
		return $DB->Query($Sql); 
	};
	function Row($Qr){
		GLOBAL $DB;
		return $DB->Row($Qr); 
	};
	function Free(){
		GLOBAL $DB;
		return $DB->Free(); 
	};
	function Close(){
		GLOBAL $DB;
		return $DB->Close(); 
	};
	//$Props = mapMethod($DB);
	$PConnect = "PConnect";
	$Connect = "Connect";
	$Query = 'Query';
	$Row = 'Row';
	$Free = 'Free';
	$Close = 'Close';
?>