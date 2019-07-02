<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Select The Data</title>
</head>
<body>
	<?php
		$pdo = new pdo("mysql:host=localhost;dbname=crud_db","root","");
		$select = $pdo->prepare("SELECT * FROM `tbl_product` ");
		$select->execute(); 
		while($result = $select->fetch()){
			var_dump($result);
		}
		echo "<br><hr>Both<br>";
		$select->execute(); 
		while($result = $select->fetch(PDO::FETCH_BOTH)){
			var_dump($result);
		}
		echo "<br><hr>Number<br>";
		$select->execute();
		while($result=$select->fetch(PDO::FETCH_NUM)){
			var_dump($result);
		}
		echo "<br><hr>Assoc<br>";
		$select->execute();
		while($result = $select->fetch(PDO::FETCH_ASSOC)){
			var_dump($result);
		}
		echo "<br><hr>Object<br>";
		$select->execute();
		while($result = $select->fetch(PDO::FETCH_OBJ)){
			var_dump($result);
		}

	?>
</body>
</html>