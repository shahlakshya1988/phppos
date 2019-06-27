<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Retriving Data -> FetchAll</title>
</head>
<body>
	<?php 
		$pdo = new pdo("mysql:host=localhost;dbname=crud_db","root","");
		$select = $pdo->prepare("SELECT * FROM `tbl_product` ");
		
		$select->execute();
		$result = $select->fetchAll();
		var_dump($result);
		echo "<pre>",print_r($result),"</pre>";
	?>
</body>
</html>