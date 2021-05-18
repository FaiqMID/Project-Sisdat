<?php
class NDB{
    /*
	This is class for wrapper php database layer to simplify coding that play with multi database
	Created by 	: nas (mas_snas@yahoo.com, nas@posindonesia.co.id)
	Date 		: August 28, 2012
	Version		: 1.0.0
	*/
	public 
		$User,
		$Pass,
		$Host,
		$Port,
		$Db,
		$SrvType,
		$Persistent,
		$Connected,
		$_Pconnect;
		
	protected
	    $Conn,
		$Data;
	function __construct() {
		$Persisten = 0;
		$Connected = 0;
		//print "In constructor\n";
		//$this->name = "NDB";
    }

    function __destruct() {
		//print "Destroying " . $this->name . "\n";
    }
	public function Connect(){
		switch ($this->SrvType)
		{
			case "sqlsrv":
				$ConnInfo = array(  "UID"=>$this->User,
									"PWD"=>$this->Pass,
									"Database"=>$this->Db);
				if ($this->Persistent==0){
					$DBConnect = $this->SrvType."_connect";
				}else{
					$DBConnect = $this->SrvType."_connect";
				}
				$Server = $this->Host.",".$this->Port;
				$this->Conn = $DBConnect($Server,$ConnInfo) or die( print_r( sqlsrv_errors(), true));
			break;
			case "ibase":
				if ($this->Persistent==0){
					$DBConnect = $this->SrvType."_connect";
				}else{
					$DBConnect = $this->SrvType."_pconnect";
				}
				$Server = $this->Host."/".$this->Port.":".$this->Db;
				$this->Conn = $DBConnect($Server,$this->User,$this->Pass,'UTF8') or die ("Error, Cannot Connect database! Please ceck your User/ Password/ Network Configuration..");
			break;
			case "mssql":
				if ($this->Persistent==0){
					$DBConnect = $this->SrvType."_connect";
				}else{
					$DBConnect = $this->SrvType."_pconnect";
				}
				$Select=$this->SrvType."_select_db";
				$Server = $this->Host.",".$this->Port;
				$this->Conn = $DBConnect($Server,$this->User,$this->Pass) or die ("Error, Cannot Connect database! Please ceck your User ".$this->User."/ Password ".$this->Pass."/ Network Configuration..");
				$Select($this->Db);
			break;
		    default:
				if ($this->Persistent==0){
					$DBConnect = $this->SrvType."_connect";
				}else{
					$DBConnect = $this->SrvType."_pconnect";
				}
				$Select=$this->SrvType."_select_db";
				$Server = $this->Host.":".$this->Port;
				$this->Conn = $DBConnect($Server,$this->User,$this->Pass) or die ("Error, Cannot Connect database! ");
				$Select($this->Conn,$this->Db);
			break;	
		}
		$this->Connected= 1;
		return $this->Conn;
	}

	public function Query($Sql){
	    if ($this->Connected==0){
		   $this->Connect();
		}
		$DBQuery = $this->SrvType."_query";
		switch ($this->SrvType)
		{
			case "mssql":
				$this->Data= $DBQuery($Sql,$this->Conn) or die( "Error, Cannot execute Query ! Please check the syntax..");
			break;
			default:
				$this->Data= $DBQuery($this->Conn,$Sql) or die( "Error, Cannot execute Query ! Please check the syntax..");
			break;
		}
		return $this->Data;
	}
	
	public function Row(&$Qr){
		switch ($this->SrvType)
		{
			case "ibase":
				$DBRow = $this->SrvType."_fetch_row";
				return $DBRow($Qr);
		    break;
			case "mssql":
				$DBRow = $this->SrvType."_fetch_row";
				return $DBRow($Qr);
		    break;
			default:
		        $DBRow = $this->SrvType."_fetch_array";
				return $DBRow($Qr);
			break;
		}
	}
	public function Num_rows(&$Qr){
		switch ($this->SrvType)
		{
			case "ibase":
				$DBRow = $this->SrvType."_num_rows";
				return $DBRow($Qr);
		    break;
			case "mssql":
				$DBRow = $this->SrvType."_num_rows";
				return $DBRow($Qr);
		    break;
			case "sqlsrv":
				$DBRow = $this->SrvType."_num_rows";
				return $DBRow($Qr);
		    break;
			default:
		        $DBRow = $this->SrvType."_num_rows";
				return $DBRow($Qr);
			break;
		}
	}
	public function Free(&$Qr){
		$DBFree = 	$this->SrvType."_free_result";
		return $DBFree($Qr);
	}
	
	public function Close(){
		switch ($this->SrvType)
		{
		case "sqlsrv":
		
		break;
		default:
			$ConnClose=$this->SrvType."_close";
			return $ConnClose($this->Conn);
		break;
		}
	}
}
?>