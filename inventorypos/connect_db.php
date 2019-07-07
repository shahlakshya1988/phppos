<?php
ob_start();
$baseurl="http://localhost/phppos/inventorypos/";
if(session_status()==PHP_SESSION_NONE){
    session_start(); 
}
try{
	$pdo = new pdo("mysql:host=localhost;dbname=pos_db","root","");
}catch(Exception $e){
	//var_dump($e->getMessage());

}

?>
