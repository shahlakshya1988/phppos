<?php 
require_once "dbconnect.php";
if(isset($_POST["btnSubmitProduct"])){
	$productname = trim($_POST["productname"]);
	$productprice = trim($_POST["productprice"]);
	if(!empty($productname) && !empty($productprice) ){
		$insert = $pdo->prepare("INSERT INTO `tbl_product` (`productname`,`productprice`) values (:name,:price)");
		$insert->bindParam(":name",$productname);
		$insert->bindParam(":price",$productprice);
		$insert->execute();
		if($insert->rowCount()){
			echo "<h3>Insert Successfull</h3>";
		}else{
			echo "<h3>Insert Fail</h3>";
		}
	}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<form action="" method="POST">
		<input type="text" name="productname" id="productname">
		<input type="text" name="productprice" id="productprice">
		<input type="submit" name="btnSubmitProduct" value="Add Product">
	</form>
</body>
</html>