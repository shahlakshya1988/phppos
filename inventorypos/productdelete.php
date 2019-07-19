<?php 
require_once "connect_db.php";
$pid = trim($_POST["pid"]);
$del = $pdo->prepare("DELETE FROM `tbl_product` where `productid` = :productid LIMIT 1");
$del->bindParam(":productid",$pid);
$del->execute();
if($del->rowCount()){
	echo "Yes";die();
}