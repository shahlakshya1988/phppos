<?php 
$baseurl="http://localhost/phppos/inventorypos/";
try{
	$pdo = new pdo("mysql:host=localhost;dbname=pos_db","root","");
}catch(Exception $e){
	//var_dump($e->getMessage());
	
}

?>