<?php require "dbconnect.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Retriving Data, FETCH_NUM</title>
</head>
<body>
	<?php
		$select= $con->prepare("SELECT * FROM `tbl_product`");
		$select->execute();
		while($row = $select->fetch(PDO::FETCH_NUM)){
			echo "<br>"; var_dump($row); echo "<hr><br>";
		} 
	?>
</body>
</html>