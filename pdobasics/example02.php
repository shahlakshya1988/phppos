<?php require "dbconnect.php"; ?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Retriving The Data</title>
</head>
<body>
	<?php
		$select = $con->prepare("SELECT * FROM `tbl_product`");
		$select->execute();
		echo "<table>";
		while($row=$select->fetch()){
			echo "<tr>";
				echo "<td>{$row['productname']}</td>";
				echo "<td>{$row['productprice']}</td>";
			echo "</tr>";
		}
		echo "</table>";
	?>
</body>
</html>