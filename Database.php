<?php

class ConnectDatabase
{
static $ins=null;
private $dbHelper=null;
public static function getInstance()
{
 global $ins;
 if($ins==null)
 {
 	$ins=new ConnectDatabase();
 } 
 return $ins;
}

public function connection()
{
$servername = "localhost";
$username = "root";
$password = "";

// Create connection
$this->dbHelper = new mysqli($servername, $username, $password,"drugs");
$this->dbHelper->set_charset("utf8");
// Check connection
if ($this->dbHelper->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}else
{
return $this->dbHelper;	
}
	
}
 
}
?>