<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>PHP Arrays - Index Array</title>
</head>
<body>
	<?php
		$products=array("HP","Dell","Apple","Samsung","Microsoft","Google",20,23,45,65);
		echo "<pre>",print_r($products),"</pre>";
		echo $products[0]."<br>";
		echo $products[1]."<br>";
		echo $products[2]."<br>";
		echo $products[3]."<br>";
		echo $products[4]."<br>";
		echo $products[5]."<br>";
		echo "Count => ".count($products),"<br>";
		echo "<pre>",print_r($products),"</pre>";
		echo "<br>";
		print_r($products);
		echo "<br>";
		var_dump($products);
	?>
</body>
</html>