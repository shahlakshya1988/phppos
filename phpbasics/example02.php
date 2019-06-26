<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width,initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<title>Example 02 | PHP: Variables</title>
	</head>
	<body>
		<?php 
		/*
		- Variable can have a short name like a and ba or a more descriptive name like Product Price Qunatity
		- Used for storing data or values which can be used anytime by using variable name
		- Starts with $ sign
		- Variables are alpha numeric, means they can contain numbers[0 to 9], [a to z] [A to Z] [_]
		- Variables can only start with name or underscore
		- Variables are case sensitive
		
		*/
		$fullname ="Lakshya Shah";
		echo $fullname; // here fullname has "Lakshya Shah"
		echo "<br>";
		$fullname="Shah Lakshya Pradhyuman"; // Prev value replaced
		echo $fullname; // Here fullname has Shah Lakshya Pradhyuman
		?>
	</body>
</html>